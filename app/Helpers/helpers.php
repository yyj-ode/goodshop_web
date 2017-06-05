<?php
/**
 * 用程序更新 .env 配置文件
 */
if (!function_exists('modifyEnv')) {
    function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';

        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));

        $contentArray->transform(function ($item) use ($data) {
            foreach ($data as $key => $value) {
                if (str_contains($item, $key)) {
                    return $key . '=' . $value;
                }
            }

            return $item;
        });

        $content = implode($contentArray->toArray(), "\n");

        \File::put($envPath, $content);
    }
}


/**
 * 过滤脚本代码
 */
if (!function_exists('clean_js')) {
    function clean_js($text)
    {
        $text = trim($text);
        $text = stripslashes($text);
        //完全过滤注释
        $text = preg_replace('/<!--?.*-->/', '', $text);
        //完全过滤动态代码

        $text = preg_replace('/<\?|\?>/', '', $text);

        //完全过滤js
        $text = preg_replace('/<script?.*\/script>/', '', $text);
        //过滤多余html
        $text = preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|form|iframe|frame|frameset)[^><]*>/i', '', $text);
        //过滤on事件lang js
        while (preg_match('/(<[^><]+)(lang|onfinish|onmouse|onexit|onerror|onclick|onkey|onload|onchange|onfocus|onblur)[^><]+/i', $text, $mat)) {
            $text = str_replace($mat [0], $mat [1], $text);
        }
        while (preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i', $text, $mat)) {
            $text = str_replace($mat [0], $mat [1] . $mat [3], $text);
        }
        return $text;
    }
}

/**
 * 纯文本输入
 */
if (!function_exists('clear_text')) {
    function clear_text($text)
    {
        $text = clean_js($text);
        //去除图片 视频 连接
        $text = preg_replace('/\[(图片)(\d+)\]/is', ' ', $text);
        $text = preg_replace('/\[(视频)(\d+)\]/is', ' ', $text);
        $text = preg_replace('/\[(url)([\s\S]*)\]([^\[]+)(\[\/url\])/is', ' ', $text);
        //彻底过滤空格BY xiomai
        $text = preg_replace('/\s(?=\s)/', '', $text);
        $text = preg_replace('/[\n\r\t]/', ' ', $text);
        $text = str_replace('  ', ' ', $text);
        $text = str_replace(' ', '', $text);
        $text = str_replace('&nbsp;', '', $text);
        $text = str_replace('&', '', $text);
        $text = str_replace('=', '', $text);
        $text = str_replace('-', '', $text);
        $text = str_replace('#', '', $text);
        $text = str_replace('%', '', $text);
        $text = str_replace('!', '', $text);
        $text = str_replace('@', '', $text);
        $text = str_replace('^', '', $text);
        $text = str_replace('*', '', $text);
        $text = str_replace('amp;', '', $text);

        $text = strip_tags($text); // 去除HTML、XML 以及 PHP 的标签
        $text = htmlspecialchars($text);
        $text = str_replace("'", "", $text);
        return $text;
    }
}

/**
 * 采集网页内容的方法
 */
if (!function_exists('http_curl')) {
    function http_curl($url, $header = null)
    {
        if (!empty($header)) {
            $header = [
                'User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36',
            ];
        }
        $timeout = 10;
        $ch = curl_init();
        //设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);

        if ($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        //执行并获取HTML文档内容
        $file_contents = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        //打印获得的数据
        return $file_contents;
    }
}


/**
 * image_thumb('http://image.iqilong.com/uploads/images/20160605/b2cb33eb90b27fb04278de01ad274994.png','w_385')
 */
if (!function_exists('image_thumb')) {
    function image_thumb($imageLink, $rules)
    {
        $url = 'http://image.iqilong.com/';
        $imageLink = str_replace($url, $url . 'thumb' . DIRECTORY_SEPARATOR, $imageLink);
        if (empty($rules)) {
            return $imageLink;
        } else {
            $urlData = explode(".", $imageLink);
            $end = $urlData[count($urlData) - 1];
            $url = str_replace('.' . $end, ',' . $rules . '.' . $end, $imageLink);
            return $url;
        }
    }
}

if (!function_exists('article_content_thumb')) {
    function article_content_thumb($mains, $str)
    {
        $pattern = '#src="(.*)"#iUs';
        preg_match_all($pattern, $mains, $matches);

        if (count($matches[0]) != 0) {
            foreach ($matches[1] as $key => $value) {
                $newimg = thumb_image($value, $str);
                $mains = str_replace($value, $newimg, $mains);
            }
        }
        return $mains;
    }
}
/********************对图片链接进行替换*********************/
if (!function_exists('thumb_image')) {
    function thumb_image($imageLink, $data, $url = 'http://image.iqilong.com/')
    {
        $imageLink = str_replace($url, $url . 'thumb' . DIRECTORY_SEPARATOR, $imageLink);
        if (count($data) == 0) {
            return $imageLink;
        } else {
            $urlData = explode(".", $imageLink);
            $end = $urlData[count($urlData) - 1];
            $url = str_replace('.' . $end, ',' . $data . '.' . $end, $imageLink);
            return $url;
        }
    }
}


/**
 * html 压缩
 * @param $string
 * @return mixed
 */
if (!function_exists('compress_html')) {
    function compress_html($string)
    {
        $string = str_replace("\r\n", '', $string); //清除换行符
        $string = str_replace("\n", '', $string); //清除换行符
        $string = str_replace("\t", '', $string); //清除制表符
        $pattern = array(
            "/> *([^ ]*) *</", //去掉注释标记
            "/[\s]+/",
            "/<!--[\\w\\W\r\\n]*?-->/",
            "/\" /",
            "/ \"/",
            "'/\*[^*]*\*/'"
        );
        $replace = array(
            ">\\1<",
            " ",
            "",
            "\"",
            "\"",
            ""
        );
        return preg_replace($pattern, $replace, $string);
    }
}

/**
 * @param $path
 * @param string $detect web wap
 * @return bool
 */
if (!function_exists('html_delete')) {
    function html_delete($path, $detect = "web")
    {
        $file = PUBLIC_HTML . $detect . DIRECTORY_SEPARATOR . $path . '.html';
        if (file_exists($file)) {
            return unlink($file);
        } else {
            return false;
        }
    }
}

/**
 * 生成静态html文件
 */
if (!function_exists('create_html')) {
    function create_html($page, $content, $detect = "web", $path = null)
    {
        $htmlContent = compress_html($content);
        if ($path == null) {
            $realPath = public_path('storage') . DIRECTORY_SEPARATOR . $detect;
        } else {
            $realPath = public_path('storage') . DIRECTORY_SEPARATOR . $detect . DIRECTORY_SEPARATOR . $path;
        }

        $htmlPath = $realPath . DIRECTORY_SEPARATOR . $page . '.html';

        if (!file_exists($realPath) || !is_dir($htmlPath)) {
            @mkdir($realPath, 0777, true);
        } else {
            @chmod($realPath, 0777);
        }

        return file_put_contents($htmlPath, $htmlContent);
    }
}

if (!function_exists('routes_path')) {
    function routes_path($default = '')
    {
        $path = 'routes' . DIRECTORY_SEPARATOR . $default;
        return base_path($path);
    }
}

if (!function_exists('show_img')) {
    //显示图片
    function show_img($img, $default = '')
    {
        $img_url = '';
        if (!$img) {
            //地址不存在
            if (strpos($default, 'http://') === 0) {
                //默认地址为绝对地址
                $img_url = $default;
            } elseif (strpos($default, '/') === false) {
                //默认地址为七牛地址
                $img_url = get_qiniu_url() . $default;
            } else {
                //默认地址为相对地址
                $img_url = URL::to($default);
            }
        } elseif (strpos($img, 'http://') === 0) {
            //绝对地址
            $img_url = $img;
        } else {
            if (strpos($img, '/') === false) {
                //七牛地址
                $img_url = get_qiniu_url() . $img;
            } else {
                //相对地址
                $img_url = URL::to($img);
            }
        }

        return $img_url;
    }
}

if (!function_exists('get_qiniu_url')) {
    //获取七牛文件访问地址
    function get_qiniu_url()
    {
        $config = Config::get('nxd');

        return 'http://' . $config['bucket_onarim'] . '.' . $config['qi_niu_host'] . '/';
    }
}

if (!function_exists('website_view')) {
    function website_view()
    {
        $args = func_get_args();
        if (!empty($args[0])) {
            $args[0] = 'website.' . $args[0];
        }

        return call_user_func_array('view', $args);
    }
}

if (!function_exists('admin_view')) {
    function admin_view()
    {
        $args = func_get_args();
        if (!empty($args[0])) {
            $args[0] = 'admin.' . $args[0];
        }

        return call_user_func_array('view', $args);
    }
}

if (!function_exists('wechat_view')) {
    function wechat_view()
    {
        $args = func_get_args();
        if (!empty($args[0])) {
            $args[0] = 'wechat.' . $args[0];
        }

        $share = [
            'title' => '人类健康网',
            'desc' => '人类健康网',
            'imgUrl' => 'http://cdn.nxdai.com/logo.png',
            'link' => URL::full(),
            'share_link' => URL::full(),
            'titleOfTimeline' => '人类健康网'
        ];

        if (in_wechat()) {
            if (sizeof($args) > 1 && !array_key_exists('share', $args[1])) {
                $args[1]['share'] = $share;
            } else if (sizeof($args) == 1) {
                array_push($args, ['share' => $share]);
            }
        }

        return call_user_func_array('view', $args);
    }
}

if (!function_exists('in_wechat')) {
    function in_wechat()
    {
        return \Jenssegers\Agent\Facades\Agent::match('MicroMessenger');
    }
}

if (!function_exists('wechat_view_or_json')) {
    function wechat_view_or_json($viewName, $viewData, $jsonData, $condition = "UNDEFINED")
    {
        if ($condition == "UNDEFINED") {
            $condition = \Illuminate\Support\Facades\Input::get("page");
        }
        if ($condition) {
            return response()->json($jsonData);
        } else {
            return call_user_func_array('wechat_view', array($viewName, $viewData));
        }
    }
}

if (!function_exists('captcha_need')) {
    function captcha_need()
    {
        return \Illuminate\Support\Facades\Session::get("captcha:need");
    }
}

// 时间显示，只保留两位数
if (!function_exists('friendly_duration')) {
    function friendly_duration($seconds)
    {
        $seconds = ($seconds < 0) ? 0 : $seconds;
        if ($seconds < 3600) {// one hour
            return sprintf("%d分%d秒", floor($seconds / 60), $seconds % 60);
        } else {
            if ($seconds < 3600 * 24) { // one day
                return sprintf("%d时%d分", floor($seconds / 3600), floor(($seconds % 3600) / 60));
            }
        }

        return sprintf("%d天%d时", floor($seconds / (3600 * 24)), floor(($seconds % (3600 * 24)) / 3600));
    }
}

// 加密
if (!function_exists('hashid_encode')) {
    function hashid_encode($id)
    {
        return \App\Utils\Utils::hashidEncode($id);
    }
}

// 解密
if (!function_exists('hashid_decode')) {
    function hashid_decode($code)
    {
        return \App\Utils\Utils::hashidDecode($code);
    }
}

// 配置
if (!function_exists('debug_assets')) {
    function debug_assets($path, $path2 = null)
    {
//        return config('nxd.live_img_url').$path;
        $path2 = $path2 ? $path2 : $path;
        return config('app.debug') ? asset($path) : (config('nxd.live_img_url') . $path2);
    }
}

if (!function_exists('number2cn')) {
    /**
     * 数字转中文
     * 数字在999999999999以下
     * 数字够大的时候小数点后会取整,奇怪了
     * @param string $number 无序数组
     * @return string $str 有序数组
     */
    function number2cn($number)
    {
        if (!is_numeric($number)) {
            return "非数字";
        } elseif ($number > 999999999999 || $number < -999999999999) {
            return "数字超出范围";
        }
        $p = explode(".", $number);
        $cn_arr = array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖");
        $p_arr = array("", "拾", "佰", "仟");
        $unit_arr = array("", "万", "亿");
        $str = "";
        $zero = false;//零标志
        $unit = "";//单位
        //处理小数点后数字
        if (isset($p[1])) {//小数点后有数字存在
            $dot = "點";
            $l = strlen($p[1]);
            for ($i = 0; $i < $l; $i++) {
                $dot .= $cn_arr[$p[1]{$i}];
            }
        } else {
            $dot = "";
        }
        $number = $p[0];    //小数点前数字
        $l = strlen($number);//数字位数
        for ($i = $l - 1, $j = 0; $i >= 0; $i--, $j++) {
            $pos = $number{$i};
            if ($pos == "-") {
                $str = "負" . $str;
                break;
            }
            if ($j % 4 == 0) {
                $unit = $unit_arr[$j / 4];
            }
            if ($pos == '0') {
                $zero = true;
                continue;
            }
            if ($zero) {
                if ($str != "") {
                    $str = $cn_arr[$pos] . $p_arr[$j % 4] . $unit . $cn_arr[0] . $str;
                } else {
                    $str = $cn_arr[$pos] . $p_arr[$j % 4] . $unit;
                }
                $zero = false;
            } else {
                $str = $cn_arr[$pos] . $p_arr[$j % 4] . $unit . $str;
            }
            $unit = "";
        }
        return $str . $dot;
    }

    if (!function_exists('ds')) {

        /**
         * Dump the last sql.
         *
         * @param  mixed
         * @return string
         */
        function ds()
        {
            $sql = DB::getQueryLog();
            $query = end($sql);
            dump($query['query']);
        }
    }
}
if (!function_exists('beginToday')) {
    /**
     * 获取今日开始时间戳
     * @return int
     */
    function beginToday()
    {
        return mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    }
}


if (!function_exists('endToday')) {
    /**
     * @return int
     * 获取今日结束时间戳
     */
    function endToday()
    {
        return mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
    }
}


if (!function_exists('beginYesterday')) {
    /**
     * 获取昨日起始时间戳和结束时间戳
     * @return int
     */
    function beginYesterday()
    {
        return mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
    }
}

if (!function_exists('endYesterday')) {
    /**
     * 获取昨日结束时间戳
     */
    function endYesterday()
    {
        return mktime(0, 0, 0, date('m'), date('d'), date('Y')) - 1;
    }
}


if (!function_exists('beginLastweek')) {
    //获取上周起始时间戳和结束时间戳
    function beginLastweek()
    {
        return mktime(24, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
    }
}

if (!function_exists('endLastweek')) {
    function endLastweek()
    {
        return mktime(24, 00, 00, date('m'), date('d') - date('w') + 7 - 7, date('Y'));
    }
}

if (!function_exists('beginThismonth')) {
    //获取本月起始时间戳和结束时间戳
    function beginThismonth()
    {
        return mktime(0, 0, 0, date('m'), 1, date('Y'));
    }
}


if (!function_exists('endThismonth')) {
    function endThismonth()
    {
        return mktime(24, 00, 00, date('m'), date('t'), date('Y'));
    }
}

if (!function_exists('beginLastmonth')) {
    //获取上月起始时间戳和结束时间戳
    function beginLastmonth()
    {
        return mktime(0, 0, 0, date('m') - 1, 1, date('Y'));
    }
}

if (!function_exists('endLastmonth')) {
    function endLastmonth()
    {
        return mktime(24, 00, 00, date('m') - 1, date('t') - 1, date('Y'));
    }
}


/**
 * 获取 IP  地理位置
 * 淘宝IP接口
 * @Return: array
 */
if (!function_exists('getCityByIp')) {
    function getCityByIp($ip = '')
    {
        if (empty($ip)) {
            $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
            $ip = json_decode(file_get_contents($url), true);
            $data = $ip;
        } else {
            $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
            $ip = json_decode(file_get_contents($url));
            if ((string)$ip->code == '1') {
                return false;
            }
            $data = (array)$ip->data;
        }

        return $data;
    }
}

if (!function_exists('isActive')) {
    function isActive($uri)
    {
        return stripos(URL::current(), $uri) ? true : false;
    }
}

if (!function_exists('sendSms')) {
    /**
     * 阿里云 发送短息
     * @param $mobile 手机号码
     * @param $template 短息模板
     * @param $json_data 模板消息
     * @return string  返回数据
     */
    function sendSms($mobile, $template, $json_data)
    {
        include app_path('Library/Aliyun/Core/Config.php');

        $iClientProfile = \DefaultProfile::getProfile("cn-hangzhou", config('common.sms_access_key'), config('common.sms_access_secret'));
        $client = new \DefaultAcsClient($iClientProfile);
        $request = new \App\Library\Aliyun\Sms\SingleSendSmsRequest();
        $request->setSignName(config('common.sms_sign_name'));/*签名名称*/
        $request->setTemplateCode($template);/*模板code*/
        $request->setRecNum($mobile);/*目标手机号*/
        $request->setParamString($json_data);/*模板变量，数字一定要转换为字符串*/

        try {
            $response = $client->getAcsResponse($request);
            $data = ['status' => 200, 'data' => $response];
            return json_encode($data);
        } catch (ClientException  $e) {
            $data = ['status' => 500, ['data' => ['error_code' => $e->getErrorCode(), 'error_message' => $e->getErrorMessage()]]];
            return json_encode($data);
        } catch (ServerException  $e) {
            $data = ['status' => 500, ['data' => ['error_code' => $e->getErrorCode(), 'error_message' => $e->getErrorMessage()]]];
            return json_encode($data);
        }
    }
}


if (!function_exists('sendMobileCode')) {
    /**
     * 阿里云 发送短息
     * @param $mobile 手机号码
     * @param $template 短息模板
     * @param $json_data 模板消息
     * @return string  返回数据
     */
    function sendMobileCode($mobile, $template, $json_data)
    {
        include app_path('Library/Aliyun/Core/Config.php');

        $iClientProfile = \DefaultProfile::getProfile("cn-hangzhou", config('common.sms_access_key'), config('common.sms_access_secret'));
        $client = new \DefaultAcsClient($iClientProfile);
        $request = new \App\Library\Aliyun\Sms\SingleSendSmsRequest();
        $request->setSignName(config('common.sms_sign_name'));/*签名名称*/
        $request->setTemplateCode($template);/*模板code*/
        $request->setRecNum($mobile);/*目标手机号*/
        $request->setParamString($json_data);/*模板变量，数字一定要转换为字符串*/

        try {
            $response = $client->getAcsResponse($request);
            $data = ['status' => 200, 'data' => $response];
            return json_encode($data);
        } catch (ClientException  $e) {
            $data = ['status' => 500, ['data' => ['error_code' => $e->getErrorCode(), 'error_message' => $e->getErrorMessage()]]];
            return json_encode($data);
        } catch (ServerException  $e) {
            $data = ['status' => 500, ['data' => ['error_code' => $e->getErrorCode(), 'error_message' => $e->getErrorMessage()]]];
            return json_encode($data);
        }
    }
}


/**
 * 截取字符串
 * @param $str   截取的支付串
 * @param $start 开始几个
 * @param $end   结束几个
 * @param string $string
 * @return string
 */
if (!function_exists('encodeString')) {
    function encodeString($str, $start, $end, $string = "****")
    {
        return iconv_substr($str, 0, $start) . $string . iconv_substr($str, -$end);
    }
}

if (!function_exists('makeCaptchaCode')) {
    function makeCaptchaCode($length = 6)
    {
        $chars = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
        $keys = array_rand($chars, $length);
        shuffle($keys);
        $password = implode('', $keys);
        return $password;
    }
}

if (!function_exists('getSelectedConfig')) {
    function getSelectedConfig($allData, $default = null)
    {
        $html = '';
        foreach ($allData as $key => $item) {
            if (!empty($default) && (intval($key) == intval($default))) {
                $html .= '<option value="' . $key . '" selected="selected">' . $item . '</option>';
            } else {
                $html .= '<option value="' . $key . '">' . $item . '</option>';
            }
        }
        return $html;
    }
}

//if(!function_exists('isActive')) {
//    /**
//     * Determine the nav if it is the current route.
//     *
//     * @param string $nav
//     * @return boolean
//     */
//    function isActive($nav) {
//        return Route::currentRouteName() == $nav ? 'active' : '';
//    }
//}

if (!function_exists('human_filesize')) {
    /**
     * Get a readable file size.
     *
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];

        $floor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $floor)) . @$size[$floor];
    }
}

if (!function_exists('route_role')) {
    /**
     * Get a readable file size.
     *
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    function route_role($route, $type)
    {

        if ($type == "Backend") {
            $route = str_replace('App\Http\Controllers\Backend\\', '', $route);
            $route = str_replace('\\', '_', $route);
            $route = str_replace('@', '_', $route);
            $route = str_replace('Controller', '', $route);
        } else {
            $route = str_replace('App\Http\Controllers\Frontend\\', '', $route);
            $route = str_replace('\\', '_', $route);
            $route = str_replace('@', '_', $route);
            $route = str_replace('Controller', '', $route);
        }

        return strtolower($route);
    }
}

if (!function_exists('is_weixin')) {
    /**
     * 判断是否为微信打开
     * @return bool
     */
    function is_weixin()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isMobile')) {
    function isMobile($mobile)
    {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }
}


if (!function_exists('strExplode')) {
    function strExplode($str,$type=',')
    {
        if(strlen($str)!=0){
            $data = explode($type,$str);
            return $data[0];
        }
        return '';
    }
}
/**
 * 时间转换
 */
if (!function_exists('timeShow')) {
    function timeShow($create)
    {
        if($create){
            $new = time();
            $time = strtotime($create);
            $diff = $new - $time;

            if($diff<180){
                $res = '刚刚';
            } elseif($diff<3600){
                $res = abs(round($diff/60)).'分钟前';
            }elseif ($diff == 3600){
                $res = '1小时前';
            } elseif($diff<86400){
                $res = abs(round($diff/3600)).'小时前';
            } elseif($diff<172800){
                $res = '昨天';
            } elseif ($diff<604800){
                $res = abs(round($diff/86400)).'天前';
            } elseif ($diff>604800 || $diff=604800){
                $res =  date('Y-m-d',$time); //显示当前时间
            }
        }else{
            $res = '';
        }
        return $res;
    }
}

/**
 * 价格转换
 */
if (!function_exists('moneyval')) {
    function str_to_money($str='')
    {
        preg_match('/万/',$str,$wan);
        if($wan != null){
            $money = intval(floatval($str)*10000);
            return $money;
        }else{
            $money = intval($str);
            return $money;
        }
    }
}
/**
 *
 */
if (!function_exists('sstrlen')) {
    function sstrlen($str,$charset="utf-8") {
        $n = 0; $p = 0; $c = '';
        $len = strlen($str);
        if($charset == 'utf-8') {
            for($i = 0; $i < $len; $i++) {
                $c = ord($str{$i});
                if($c > 252) {
                    $p = 5;
                } elseif($c > 248) {
                    $p = 4;
                } elseif($c > 240) {
                    $p = 3;
                } elseif($c > 224) {
                    $p = 2;
                } elseif($c > 192) {
                    $p = 1;
                } else {
                    $p = 0;
                }
                $i+=$p;$n++;
            }
        } else {
            for($i = 0; $i < $len; $i++) {
                $c = ord($str{$i});
                if($c > 127) {
                    $p = 1;
                } else {
                    $p = 0;
                }
                $i+=$p;$n++;
            }
        }
        return $n;
    }
}
if (!function_exists('msubstr')) {
    function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }

        $count=sstrlen($str);
        if($count>$length){
            return $suffix ? $slice.'...' : $slice;
        }else{
            return $slice;
        }

    }
}