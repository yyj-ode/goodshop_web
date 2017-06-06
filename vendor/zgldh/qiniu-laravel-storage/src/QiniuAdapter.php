<?php namespace zgldh\QiniuStorage;

use League\Flysystem\Adapter\AbstractAdapter;
use League\Flysystem\Adapter\Polyfill\NotSupportingVisibilityTrait;
use League\Flysystem\Adapter\Polyfill\StreamedReadingTrait;
use League\Flysystem\Config;
use Qiniu\Auth;
use Qiniu\Etag;
use Qiniu\Http\Error;
use Qiniu\Processing\Operation;
use Qiniu\Processing\PersistentFop;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\FormUploader;
use Qiniu\Storage\ResumeUploader;
use Qiniu\Storage\UploadManager;
use Qiniu\Config as QiniuConfig;

class QiniuAdapter extends AbstractAdapter
{

    use NotSupportingVisibilityTrait, StreamedReadingTrait;

    private $access_key = null;
    private $secret_key = null;
    private $bucket = null;
    private $domains = null;
    private $notify_url = null; //持久化处理后的回调地址
    private $access = null;

    private $auth = null;
    private $upload_manager = null;
    private $bucket_manager = null;
    private $operation = null;

    private $prefixedDomains = [];

    private $lastQetag = null;

    public function __construct($access_key, $secret_key, $bucket, $domains, $notify_url = null, $access = 'public')
    {
        $this->access_key = $access_key;
        $this->secret_key = $secret_key;
        $this->bucket = $bucket;
        $this->domains = $domains;
        $this->setPathPrefix('http://' . $this->domains['default']);
        $this->setDomainPrefix('http://' . $this->domains['default'], 'default');
        $this->setDomainPrefix('https://' . $this->domains['https'], 'https');
        $this->setDomainPrefix('http://' . $this->domains['custom'], 'custom');
        $this->notify_url = $notify_url;
        $this->access = $access;
    }

    /**
     * Set the path prefix.
     *
     * @param string $prefix
     *
     * @return self
     */
    public function setDomainPrefix($prefix, $domainType)
    {
        $is_empty = empty($prefix);

        if (!$is_empty) {
            $prefix = rtrim($prefix, $this->pathSeparator) . $this->pathSeparator;
        }

        $prefixedDomain = $is_empty ? null : $prefix;
        $this->prefixedDomains[$domainType] = $prefixedDomain;
    }

    private function getAuth()
    {
        if ($this->auth == null) {
            $this->auth = new Auth($this->access_key, $this->secret_key);
        }

        return $this->auth;
    }

    private function getUploadManager()
    {
        if ($this->upload_manager == null) {
            $this->upload_manager = new UploadManager();
        }

        return $this->upload_manager;
    }

    private function getBucketManager()
    {
        if ($this->bucket_manager == null) {
            $this->bucket_manager = new BucketManager($this->getAuth());
        }

        return $this->bucket_manager;
    }

    private function getOperation()
    {
        if ($this->operation == null) {
            $this->operation = new Operation(
                $this->domains['default'],
                $this->access === 'public' ? null : $this->getAuth()
            );
        }

        return $this->operation;
    }

    private function logQiniuError(Error $error, $extra = null)
    {
        \Log::error('Qiniu: ' . $error->code() . ' ' . $error->message() . '. ' . $extra);
    }

    /**
     * Update a file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function update($path, $contents, Config $config)
    {
        return $this->write($path, $contents, $config);
    }

    /**
     * Write a new file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function write($path, $contents, Config $config)
    {
        $auth = $this->getAuth();
        $token = $auth->uploadToken($this->bucket, $path);

        $params = $config->get('params', null);
        $mime = $config->get('mime', 'application/octet-stream');
        $checkCrc = $config->get('checkCrc', false);

        $upload_manager = $this->getUploadManager();
        list($ret, $error) = $upload_manager->put($token, $path, $contents, $params, $mime, $checkCrc);

        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            $this->lastQetag = $ret['hash'];
            return $ret;
        }
    }

    /**
     * Update a file using a stream.
     *
     * @param string $path
     * @param resource $resource
     * @param Config $config Config object or visibility setting
     *
     * @return mixed false of file metadata
     */
    public function updateStream($path, $resource, Config $config)
    {
        return $this->writeStream($path, $resource, $config);
    }


    /**
     * Write using a stream.
     *
     * @param string $path
     * @param resource $resource
     * @param Config $config
     *
     * @return mixed false or file metadata
     */
    public function writeStream($path, $resource, Config $config)
    {
        $auth = $this->getAuth();
        $token = $auth->uploadToken($this->bucket, $path);

        $params = $config->get('params', null);
        $mime = $config->get('mime', 'application/octet-stream');
        $checkCrc = $config->get('checkCrc', false);

        list($ret, $error) = $this->qiniuPutFile($token, $path, $resource, $params, $mime, $checkCrc);

        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            $this->lastQetag = $ret['hash'];
            return $ret;
        }
    }

    /**
     * Rewrite Qiniu\Storage\UploadManager::putFile
     * @param $upToken
     * @param $key
     * @param $fileResource
     * @param null $params
     * @param string $mime
     * @param bool $checkCrc
     * @return mixed
     * @throws \Exception
     */
    private function qiniuPutFile(
        $upToken,
        $key,
        $fileResource,
        $params = null,
        $mime = 'application/octet-stream',
        $checkCrc = false
    )
    {
        if ($fileResource === false) {
            throw new \Exception("file can not open", 1);
        }
        $file = $fileResource;
        $params = UploadManager::trimParams($params);
        $stat = fstat($file);
        $size = $stat['size'];
        if ($size <= QiniuConfig::BLOCK_SIZE) {
            $data = fread($file, $size);
            fclose($file);
            if ($data === false) {
                throw new \Exception("file can not read", 1);
            }
            $result = FormUploader::put(
                $upToken,
                $key,
                $data,
                new QiniuConfig(),
                $params,
                $mime,
                $checkCrc
            );
            return $result;
        }
        $up = new ResumeUploader(
            $upToken,
            $key,
            $file,
            $size,
            $params,
            $mime,
            new QiniuConfig()
        );
        $ret = $up->upload();
        fclose($file);
        return $ret;
    }

    /**
     * Rename a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function rename($path, $newpath)
    {
        $bucketMgr = $this->getBucketManager();

        list($ret, $error) = $bucketMgr->move($this->bucket, $path, $this->bucket, $newpath);
        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            return true;
        }
    }

    /**
     * Copy a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy($path, $newpath)
    {
        $bucketMgr = $this->getBucketManager();

        list($ret, $error) = $bucketMgr->copy($this->bucket, $path, $this->bucket, $newpath);
        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @return bool
     */
    public function delete($path)
    {
        $bucketMgr = $this->getBucketManager();

        $error = $bucketMgr->delete($this->bucket, $path);
        if ($error !== null) {
            $this->logQiniuError($error, $this->bucket . '/' . $path);

            return false;
        } else {
            return true;
        }
    }

    /**
     * Fetch a file.
     *
     * @DriverFunction
     * @param string $url
     * @param string $key
     *
     * @return bool|array
     */
    public function fetch($url, $key = null)
    {
        $bucketMgr = $this->getBucketManager();

        list($ret, $error) = $bucketMgr->fetch($url, $this->bucket, $key);
        if ($error !== null) {
            $this->logQiniuError($error, $this->bucket . '/' . $key);

            return false;
        } else {
            return $ret;
        }
    }

    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @return bool
     */
    public function deleteDir($dirname)
    {
        $files = $this->listContents($dirname);
        foreach ($files as $file) {
            $this->delete($file['path']);
        }

        return true;
    }

    /**
     * Create a directory.
     *
     * @param string $dirname directory name
     * @param Config $config
     *
     * @return array|false
     */
    public function createDir($dirname, Config $config)
    {
        return ['path' => $dirname];
    }

    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return array|bool|null
     */
    public function has($path)
    {
        $meta = $this->getMetadata($path);
        if ($meta) {
            return true;
        }

        return false;
    }

    /**
     * Read a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function read($path)
    {
        $location = $this->applyPathPrefix($path);

        return array('contents' => file_get_contents($location));
    }

    /**
     * List contents of a directory.
     *
     * @param string $directory
     * @param bool $recursive
     *
     * @return array
     */
    public function listContents($directory = '', $recursive = false)
    {
        $bucketMgr = $this->getBucketManager();

        list($items, $marker, $error) = $bucketMgr->listFiles($this->bucket, $directory);
        if ($error !== null) {
            $this->logQiniuError($error);

            return array();
        } else {
            $contents = array();
            foreach ($items as $item) {
                $normalized = [
                    'type'      => 'file',
                    'path'      => $item['key'],
                    'timestamp' => $item['putTime']
                ];

                if ($normalized['type'] === 'file') {
                    $normalized['size'] = $item['fsize'];
                }

                array_push($contents, $normalized);
            }

            return $contents;
        }
    }

    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMetadata($path)
    {
        $bucketMgr = $this->getBucketManager();

        list($ret, $error) = $bucketMgr->stat($this->bucket, $path);
        if ($error !== null) {
            return false;
        } else {
            return $ret;
        }
    }

    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getSize($path)
    {
        $stat = $this->getMetadata($path);
        if ($stat) {
            return array('size' => $stat['fsize']);
        }

        return false;
    }

    /**
     * Get the mimetype of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMimetype($path)
    {
        $stat = $this->getMetadata($path);
        if ($stat) {
            return array('mimetype' => $stat['mimeType']);
        }

        return false;
    }

    /**
     * Get the timestamp of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getTimestamp($path)
    {
        $stat = $this->getMetadata($path);
        if ($stat) {
            return array('timestamp' => $stat['putTime']);
        }

        return false;
    }

    /**
     * @DriverFunction
     * @param null $path
     * @param string $domainType
     * @return string|QiniuUrl
     */
    public function downloadUrl($path = null, $domainType = 'default')
    {
        $this->pathPrefix = $this->prefixedDomains[$domainType];
        $location = $this->applyPathPrefix($path);
        $location = new QiniuUrl($location);

        return $location;
    }

    /**
     * @DriverFunction
     * @param $path
     * @param string|array $settings ['domain'=>'default', 'expires'=>3600]
     * @return string
     */
    public function privateDownloadUrl($path, $settings = 'default')
    {
        $expires = 3600;
        $domain = 'default';
        if (is_array($settings)) {
            $expires = isset($settings['expires']) ? $settings['expires'] : $expires;
            $domain = isset($settings['domain']) ? $settings['domain'] : $domain;
        } else {
            $domain = $settings;
        }
        $this->pathPrefix = $this->prefixedDomains[$domain];
        $auth = $this->getAuth();
        $location = $this->applyPathPrefix($path);
        $authUrl = $auth->privateDownloadUrl($location, $expires);
        $authUrl = new QiniuUrl($authUrl);

        return $authUrl;
    }

    /**
     * @DriverFunction
     * @param null $path
     * @param null $fops
     * @param null $pipline
     * @param bool $force
     * @return bool
     */
    public function persistentFop($path = null, $fops = null, $pipline = null, $force = false, $notify_url = null)
    {
        $auth = $this->getAuth();

        $pfop = New PersistentFop($auth, $this->bucket, $pipline, is_null($notify_url) ? $this->notify_url : $notify_url, $force);

        list($id, $error) = $pfop->execute($path, $fops);

        if ($error != null) {
            $this->logQiniuError($error);

            return false;
        } else {
            return $id;
        }
    }

    /**
     * @DriverFunction
     * @param $id
     * @return array
     */
    public function persistentStatus($id)
    {
        return PersistentFop::status($id);
    }

    /**
     * @DriverFunction
     * @param null $path
     * @return bool
     */
    public function avInfo($path = null)
    {
        $operation = $this->getOperation();

        list($ret, $error) = $operation->execute($path, 'avinfo');

        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            return $ret;
        }
    }

    /**
     * @DriverFunction
     * @param null $path
     * @return bool
     */
    public function imageInfo($path = null)
    {
        $operation = $this->getOperation();

        list($ret, $error) = $operation->execute($path, 'imageInfo');

        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            return $ret;
        }
    }

    /**
     * @DriverFunction
     * @param null $path
     * @return bool
     */
    public function imageExif($path = null)
    {
        $operation = $this->getOperation();

        list($ret, $error) = $operation->execute($path, 'exif');

        if ($error !== null) {
            $this->logQiniuError($error);

            return false;
        } else {
            return $ret;
        }
    }

    /**
     * @DriverFunction
     * @param null $path
     * @param null $ops
     * @return string|QiniuUrl
     */
    public function imagePreviewUrl($path = null, $ops = null)
    {
        $operation = $this->getOperation();
        $url = $operation->buildUrl($path, $ops);
        $url = new QiniuUrl($url);

        return $url;
    }

    /**
     * @DriverFunction
     * @param null $path
     * @param null $ops
     * @return string|QiniuUrl
     */
    public function privateImagePreviewUrl($path = null, $ops = null)
    {
        $auth = $this->getAuth();
        $operation = $this->getOperation();
        $url = $operation->buildUrl($path, $ops);
        $authUrl = $auth->privateDownloadUrl($url);
        $authUrl = new QiniuUrl($authUrl);

        return $authUrl;
    }

    /**
     * @DriverFunction
     * @param null $path
     * @param int $expires
     * @param null $policy
     * @param bool $strictPolicy
     * @return string
     */
    public function uploadToken(
        $path = null,
        $expires = 3600,
        $policy = null,
        $strictPolicy = true
    )
    {
        $auth = $this->getAuth();

        $token = $auth->uploadToken(
            $this->bucket,
            $path,
            $expires,
            $policy,
            $strictPolicy
        );

        return $token;
    }

    /**
     * @DriverFunction
     * @param $contentType
     * @param $originAuthorization
     * @param $url
     * @param $body
     * @return bool
     */
    public function verifyCallback($contentType, $originAuthorization, $url, $body)
    {
        $auth = $this->getAuth();

        return $auth->verifyCallback($contentType, $originAuthorization, $url, $body);
    }

    /**
     * @DriverFunction
     * @param $localFilePath
     * @return array
     */
    public function calculateQetag($localFilePath)
    {
        return Etag::sum($localFilePath);
    }

    /**
     * @DriverFunction
     * @return null
     */
    public function getLastQetag()
    {
        return $this->lastQetag;
    }
}
