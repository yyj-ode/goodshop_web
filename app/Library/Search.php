<?php
/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 2017/5/3
 * Time: 下午6:36
 */

namespace App\Library;

use Log;
use Elasticsearch\ClientBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class Search
{
    protected $client;

    function __construct()
    {
        $hosts = [
            env('ELASTICSEARCH_HOSTS') . ':' . env('ELASTICSEARCH_PORT'),         // IP + Port
        ];
        $handlerParams = [
            'max_handles' => env('ELASTICSEARCH_MAX_HANDLES')
        ];
        $defaultHandler = ClientBuilder::defaultHandler($handlerParams);
        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler(storage_path('logs/search.log'), Logger::INFO));
        $this->client = ClientBuilder::create()
            ->setHosts($hosts)
            ->setHandler($defaultHandler)
            ->setLogger($logger)
            ->build();
    }

    /**
     * 删除数据
     * @param $index
     * @param $type
     * @param $id
     * @return array|bool
     */
    public function delete($index, $type, $id)
    {
        try {
            $params = [
                'index' => $index,
                'type' => $type,
                'id' => $id
            ];

            $response = $this->client->delete($params);
            Log::info('delete' . date("y-m-d H:i:s"));
            return $response;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 更新数据
     * @param $index
     * @param $type
     * @param $id
     * @param $body
     * @return array|bool
     */
    public function update($index, $type, $id, $body)
    {
        try {
            $params = [
                'index' => $index,
                'type' => $type,
                'id' => $id,
                'body' => $body
            ];

            $response = $this->client->update($params);
            Log::info('update' . date("y-m-d H:i:s"));
            return $response;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 添加单条数据
     * @param $index
     * @param $type
     * @param $body
     * @return array|bool
     */
    public function add($index, $type, $body)
    {
        try {
            $params = [
                'index' => $index,
                'type' => $type,
                'body' => $body
            ];

            $response = $this->client->index($params);
            Log::info('add' . date("y-m-d H:i:s"));
            return $response;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 添加多条数据
     * @param $params
     * @return array|bool
     */
    public function bulk($params)
    {
        try {
            $response = $this->client->bulk($params);
            Log::info('bulk' . date("y-m-d H:i:s"));
            return $response;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * @param $index
     * @param $type
     * @param $query = ['match' => ['testField' => 'abc']]
     * @return array|bool
     */
    public function query($index, $type, $body)
    {
        try {
            if ($this->existsIndex($index) === true) {
                $params = [
                    'index' => $index,
                    'type' => $type,
                    'body' => $body
                ];

                $response = $this->client->search($params);

                Log::info('query' . date("y-m-d H:i:s"));
                return $response;
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 通过id查询获取数据
     * @param $index
     * @param $type
     * @param $id
     * @return array|bool
     */
    public function getById($index, $type, $id)
    {
        try {
            $params = [
                'index' => $index,
                'type' => $type,
                'id' => $id,
                'client' => [
                    'future' => 'lazy'
                ]
            ];
            Log::info('getById' . date("Y-m-d H:i:s"));
            $response = $this->client->get($params);
            return $response;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 创建index
     * @param $index
     * @param $settings
     * @return array|bool
     */
    public function createIndex($index, $body)
    {
        if ($this->existsIndex($index) === false) {
            try {
                $params = [
                    'index' => $index,
                    'body' => $body
                ];
                $response = $this->client->indices()->create($params);
                Log::info('create_index' . date("Y-m-d H:i:s"));
                return $response;
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());
            }
        }
        return false;
    }

    /**
     * 更新index索引
     * @param $index
     * @param $body
     * @return array|bool
     */
    public function updateIndex($index, $body)
    {
        if ($this->existsIndex($index) === true) {
            try {
                $params = [
                    'index' => $index,
                    'body' => $body
                ];
                $response = $this->client->indices()->putSettings($params);
                Log::info('update_index' . date("Y-m-d H:i:s"));
                return $response;
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());
            }
        }
        return false;
    }

    /**
     * 获取index
     * @param $index
     * @return array|bool
     */
    public function getIndex($index)
    {
        if ($this->existsIndex($index) === true) {
            try {
                $params = ['index' => $index];
                $response = $this->client->indices()->getSettings($params);
                Log::info('get_index' . date("Y-m-d H:i:s"));
                return $response;
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());
            }
        }
        return false;
    }

    /**
     * 添加 mapping
     * @param $index
     * @param $type
     * @param $body
     * @return array|bool
     */
    public function putMapping($index, $type, $body)
    {
        if ($this->existsIndex($index) === true) {
            try {
                $params = [
                    'index' => $index,
                    'type' => $type,
                    'body' => $body
                ];
                $response = $this->client->indices()->putMapping($params);
                Log::info('put_mapping' . date("Y-m-d H:i:s"));
                return $response;
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());
            }
        }
        return false;
    }

    /**
     * 获取 mapping
     * @param $index
     * @param $type
     * @return array|bool
     */
    public function getMapping($index, $type = null)
    {
        if ($this->existsIndex($index) === true) {
            try {
                if (empty($type)) {
                    $params = [
                        'index' => $index
                    ];
                } else {
                    $params = [
                        'index' => $index,
                        'type' => $type
                    ];
                }

                $response = $this->client->indices()->getMapping($params);
                Log::info('get_mapping' . date("Y-m-d H:i:s"));
                return $response;
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());
            }
        }
        return false;
    }

    /**
     * 删除
     * @param $index
     * @param $type
     * @return array|bool
     */
    public function deleteMapping($index, $type)
    {
        if ($this->existsIndex($index) === true) {
            try {
                $params = [
                    'index' => $index,
                    'type' => $type
                ];
                $response = $this->client->indices()->deleteMapping($params);
                Log::info('delete_mapping' . date("Y-m-d H:i:s"));
                return $response;
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());
            }
        }
        return false;
    }

    /**
     * 判断index是否存在
     * @param $index
     * @return bool
     */
    public function existsIndex($index)
    {
        try {
            $params = ['index' => $index];
            $response = $this->client->indices()->exists($params);
            Log::info('exists_index' . date("Y-m-d H:i:s"));
            return $response;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 删除index
     * @param $index
     * @return array|bool
     */
    public function deleteIndex($index)
    {
        try {
            if ($this->existsIndex($index) === true) {
                $params = ['index' => $index];
                $response = $this->client->indices()->delete($params);
                Log::info("delete_index" . date("Y-m-d H:i:s"));
                return $response;
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }
}