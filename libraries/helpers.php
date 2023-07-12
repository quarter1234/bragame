<?php

use App\Caches\UserLoginCache;
use App\Common\Enums\UserLoginEnum;
use App\Exceptions\OutputException;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use think\response\Json;

/**
 * 获取带参数的sql
 * @param $builder
 * @return string
 */
function getSql($builder)
{
    $bindings = $builder->getBindings();
    $bindings = array_map(
        function ($param) {
            return '\'' . $param . '\'';
        },
        $bindings
    );
    $sql      = str_replace('?', '%s', $builder->toSql());

    return sprintf($sql, ...$bindings);
}

function dateFormat($date, $format = 'Y-m-d')
{
    if (!$date || $date == '1970-01-01 08:00:00') {
        return '';
    }

    if (is_numeric($date)) {
        return date($format, $date);
    }

    return date($format, strtotime($date));
}

function lock($key, $ttl)
{
    $lock = Cache::add($key, 1, $ttl);
    if (!$lock) {
        throw new OutputException('请求太频繁');
    }
}

function replaceSpecialChar($strParam)
{
    $regex = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";
    return preg_replace($regex, "", $strParam);
}

function getMiniProgram()
{
    $app   = \EasyWeChat\Factory::miniProgram(config('miniProgram.wechat'));
    $cache = new \Symfony\Component\Cache\Adapter\RedisAdapter(app('redis')->connection()->client());

    $app->rebind('cache', $cache);
    $app->access_token->getToken(true);
    // 从线上获取access_token
    // if (!app()->environment('production')) {
    //     $client   = new \GuzzleHttp\Client();
    //     $response = $client->get('https://ac.jytche.com/accessToken/HBI9ubTTDibP',['verify' => false]);
    //     $ret      = json_decode($response->getBody()->getContents(), true);
    //     $app->access_token->setToken($ret['access_token']);
    // }
    return $app;
}

function getPayment($key = 'miniProgram')
{
    // \Log::info(serialize(config($key)));
    $app   = \EasyWeChat\Factory::payment(config($key));
    $cache = new \Symfony\Component\Cache\Adapter\RedisAdapter(app('redis')->connection()->client());
    $app->rebind('cache', $cache);
    // 从线上获取access_token
    if (!app()->environment('production')) {
        $client   = new \GuzzleHttp\Client();
        $response = $client->get('https://ac.jytche.com/accessToken/HBI9ubTTDibP', ['verify' => false]);
        $ret      = json_decode($response->getBody()->getContents(), true);
        $app->access_token->setToken($ret['access_token']);
    }
    return $app;
}

function getImgUrl($filepath = '', $style = '?x-oss-process=style/800X600')
{
    return 'https://img.jytche.com/' . $filepath . $style;
}

function ip2city($ip = '')
{
    $ip2region = new Ip2Region(dirname(__FILE__) . '/ip2region/ip2region.db');
    $cityInfo  = $ip2region->btreeSearch($ip);

    $cityArr  = explode("|", $cityInfo['region']);
    $cityName = isset($cityArr[3]) ? $cityArr[3] : '';

    $city = City::where('name', $cityName)->first();

    return [
        'province_id' => $city['province_id'] ?? 0,
        'city_id'     => $city['id'] ?? 0,
    ];
}

//获得车龄
function getCarAge($plate_date)
{

    /*dd(Carbon::parse($requestData->plate_date));
    dd(Carbon::now());*/
    $plate = \Illuminate\Support\Carbon::parse($plate_date); //上牌日期对象
    $now   = \Illuminate\Support\Carbon::now();              //当前日期对象

    $plate_year  = $plate->year;
    $plate_month = $plate->month;
    $now_year    = $now->year;
    $now_month   = $now->month;

    if (($now_month - $plate_month) < 0) {
        $now_month = $now_month + 12;
        $now_year  = $now_year - 1;
    }

    $dissimilarity_month = $now_month - $plate_month;
    $dissimilarity_year  = $now_year - $plate_year;

    $return_date = $dissimilarity_year + round(($dissimilarity_month / 12), 1);

    return $return_date;
}

function hideString($string, $start = 0, $length = 0, $re = '*')
{
    if (empty($string)) return false;
    $strarr    = [];
    $mb_strlen = mb_strlen($string);
    while ($mb_strlen) {//循环把字符串变为数组
        $strarr[]  = mb_substr($string, 0, 1, 'utf8');
        $string    = mb_substr($string, 1, $mb_strlen, 'utf8');
        $mb_strlen = mb_strlen($string);
    }
    $strlen = count($strarr);
    $begin  = $start >= 0 ? $start : ($strlen - abs($start));
    $end    = $last = $strlen - 1;
    if ($length > 0) {
        $end = $begin + $length - 1;
    } elseif ($length < 0) {
        $end -= abs($length);
    }
    for ($i = $begin; $i <= $end; $i++) {
        $strarr[$i] = $re;
    }
//    if ($begin >= $end || $begin >= $last || $end > $last) return false;
    return implode('', $strarr);
}

/**
 * 数组排序
 * @param        $arr
 * @param        $keys
 * @param string $type
 * @return array
 */
function arraySort($arr, $keys, $type = 'ASC')
{
    $keysValue = $newArray = [];
    foreach ($arr as $k => $v) {
        // dd($k,$v);
        $keysValue[$k] = $v[$keys];
    }
    $type == 'ASC' ? asort($keysValue) : arsort($keysValue);
    foreach ($keysValue as $k => $v) {
        $newArray[$k] = $arr[$k];
    }
    return $newArray;
}

/*
 * 时间戳格式化成国内日期格式
 * @param null $time
 * @return false|string
 */
function time_date($time = null)
{
    return date('Y-m-d H:i:s', $time ? $time : time());
}

/* 请求成功 返回结果*/

function json_success($msg, $data = [], $code = 200)
{
    return $result = [
        'msg'  => $msg,
        'data' => $data,
        'code' => $code,
    ];
}

/* 请求失败 返回结果*/

function json_error($msg, $data = [], $code = 400)
{
    return $result = [
        'msg'  => $msg,
        'data' => $data,
        'code' => $code,
    ];
}

function success($message = '', $data = '', $code = 200): JsonResponse
{
    return json($message, $data, $code);
}

/**
 *
 * @param string $data
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
function error($message = '', $data = '', $code = 400): JsonResponse
{
    return json($message, $data, $code);
}

/**
 *
 * @param $data
 * @param $code
 * @return \Illuminate\Http\JsonResponse
 */
function json($message, $data, $code): JsonResponse
{
    return response()->json([
        'message' => $message,
        'data'    => $data
    ], $code);
}

/**
 * 超出多少个数量的中文字符 替换省略号
 * @param string $text 字符串
 * @param string $length 字符串长度
 * @param string $str 替换的字符串
 */

function subtext($text, $length, $str = '...')
{
    if (mb_strlen($text, 'utf8') > $length) {
        return mb_substr($text, 0, $length, 'utf8') . $str;
    } else {
        return $text;
    }

}

/**
 * 友好的时间显示
 * @param string $time 原始时间，非时间戳格式
 * @param boolean $showMinute 当时间超过12小时后，是否显示分钟，默认为显示
 * @return string
 */
function friendly_time($time, $showMinute = true)
{
    if (empty($time)) {
        return false;
    }
    $targetTime     = strtotime($time);
    $todayLast      = strtotime(date('Y-m-d 23:59:59'));
    $timeDifference = time() - $targetTime;
    $passedTime     = $todayLast - $targetTime;
    $passedDay      = floor($passedTime / 86400);

    if ($timeDifference < 60) {
        $result = '刚刚';
    } elseif ($timeDifference < 3600) {
        $result = (ceil($timeDifference / 60)) . '分钟前';
    } elseif ($timeDifference < 3600 * 12) {
        $result = (ceil($timeDifference / 3600)) . '小时前';
    } elseif ($passedDay == 0) {
        $result = '今天' . ($showMinute ? ' ' . date('H:i', $targetTime) : '');
    } elseif ($passedDay == 1) {
        $result = '昨天' . ($showMinute ? ' ' . date('H:i', $targetTime) : '');
    } elseif ($passedDay == 2) {
        $result = '前天' . ($showMinute ? ' ' . date('H:i', $targetTime) : '');
    } elseif ($passedDay > 2 && $passedDay < 16) {
        $result = $passedDay . '天前' . ($showMinute ? ' ' . date('H:i', $targetTime) : '');
    } else {
        $format = date('Y') != date('Y', $targetTime) ? ($showMinute ? 'Y-m-d H:i' : 'Y-m-d') : ($showMinute ? 'm-d H:i' : 'm-d');
        $result = date($format, $targetTime);
    }
    return $result;
}

//先编码成json字符串，再解码成数组
function object_to_array($object)
{
    return json_decode(json_encode($object), true);
}

// 获取字符串中的手机号码
function findThePhoneNumbers($oldStr = "")
{
    // 检测字符串是否为空
    $oldStr  = trim($oldStr);
    $numbers = [];
    if (empty($oldStr)) {
        return $numbers;
    }
    // 删除86-180640741122，0997-8611222之类的号码中间的减号（-）
    $strArr = explode("-", $oldStr);
    $newStr = $strArr[0];
    for ($i = 1; $i < count($strArr); $i++) {
        if (preg_match("/\d{2}$/", $newStr) && preg_match("/^\d{11}/", $strArr[$i])) {
            $newStr .= $strArr[$i];
        } elseif (preg_match("/\d{3,4}$/", $newStr) && preg_match("/^\d{7,8}/", $strArr[$i])) {
            $newStr .= $strArr[$i];
        } else {
            $newStr .= "-" . $strArr[$i];
        }
    }
    // 手机号的获取
    $reg = '/(1[3|4|5|7|8]\d{9})(((\D{1}|$)[\s\S]*)+)/';//匹配数字的正则表达式
    preg_match_all($reg, $newStr, $result);

    $nums = [];
    // * 中国移动：China Mobile
    // * 134[0-8],135,136,137,138,139,150,151,157,158,159,182,187,188
    $cm = "/^1(34[0-8]|(3[5-9]|5[017-9]|8[278])\d)\d{7}$/";
    // * 中国联通：China Unicom
    // * 130,131,132,152,155,156,185,186
    $cu = "/^1(3[0-2]|5[256]|8[56])\d{8}$/";
    // * 中国电信：China Telecom
    // * 133,1349,153,180,189
    $ct = "/^1((33|53|8[09])[0-9]|349)\d{7}$/";
    //
    foreach ($result[1] as $key => $value) {
        if (preg_match($cm, $value)) {
            $nums[] = ["number" => $value, "type" => "中国移动"];
        } elseif (preg_match($cu, $value)) {
            $nums[] = ["number" => $value, "type" => "中国联通"];
        } elseif (preg_match($ct, $value)) {
            $nums[] = ["number" => $value, "type" => "中国电信"];
        } else {
            // 非法号码
        }
    }
    $numbers["mobile"] = $nums;
    // 固定电话或小灵通的获取
    $reg = '/\D(0\d{10,12})\D/is';                      //匹配数字的正则表达式
    preg_match_all($reg, $newStr, $result);
    $nums = [];
    // * 大陆地区固定电话或小灵通
    // * 区号：010,020,021,022,023,024,025,027,028,029
    // * 号码：七位或八位
    $phs = "/^0(10|2[0-5789]|\d{3})\d{7,8}$/";
    foreach ($result[1] as $key => $value) {
        if (preg_match($phs, $value)) {
            $nums[] = ["number" => $value, "type" => "固定电话或小灵通"];
        } else {
            // 非法
        }
    }
    $numbers["landline"] = $nums;
    // 有可能是没有区号的固定电话的获取
    $reg = '/\D(\d{7,8})\D/is';                         //匹配数字的正则表达式
    preg_match_all($reg, $newStr, $result);
    $nums = [];
    foreach ($result[1] as $key => $value) {
        $nums[] = ["number" => $value, "type" => "没有区号的固定电话"];
    }
    $numbers["possible"] = $nums;
    // 返回最终数组
    return $numbers;
}

/**
 * 返回取汉字的第一个字的首字母
 * @param  [type] $str [string]
 * @return [type]      [strind]
 */
function getFirstChar($s)
{
    $s0 = mb_substr($s, 0, 1, 'utf-8');//获取名字的姓
    $s  = iconv('UTF-8', 'GBK', $s0);  //将UTF-8转换成GB2312编码
    if (ord($s0) > 128) {//汉字开头，汉字没有以U、V开头的
        $asc = ord($s[0]) * 256 + ord($s[1]) - 65536;
        if ($asc >= -20319 and $asc <= -20284) return "A";
        if ($asc >= -20283 and $asc <= -19776) return "B";
        if ($asc >= -19775 and $asc <= -19219) return "C";
        if ($asc >= -19218 and $asc <= -18711) return "D";
        if ($asc >= -18710 and $asc <= -18527) return "E";
        if ($asc >= -18526 and $asc <= -18240) return "F";
        if ($asc >= -18239 and $asc <= -17760) return "G";
        if ($asc >= -17759 and $asc <= -17248) return "H";
        if ($asc >= -17247 and $asc <= -17418) return "I";
        if ($asc >= -17417 and $asc <= -16475) return "J";
        if ($asc >= -16474 and $asc <= -16213) return "K";
        if ($asc >= -16212 and $asc <= -15641) return "L";
        if ($asc >= -15640 and $asc <= -15166) return "M";
        if ($asc >= -15165 and $asc <= -14923) return "N";
        if ($asc >= -14922 and $asc <= -14915) return "O";
        if ($asc >= -14914 and $asc <= -14631) return "P";
        if ($asc >= -14630 and $asc <= -14150) return "Q";
        if ($asc >= -14149 and $asc <= -14091) return "R";
        if ($asc >= -14090 and $asc <= -13319) return "S";
        if ($asc >= -13318 and $asc <= -12839) return "T";
        if ($asc >= -12838 and $asc <= -12557) return "W";
        if ($asc >= -12556 and $asc <= -11848) return "X";
        if ($asc >= -11847 and $asc <= -11056) return "Y";
        if ($asc >= -11055 and $asc <= -10247) return "Z";
    } elseif (ord($s) >= 48 and ord($s) <= 57) {//数字开头
        switch (iconv_substr($s, 0, 1, 'utf-8')) {
            case 1:
                return "Y";
            case 2:
                return "E";
            case 3:
                return "S";
            case 4:
                return "S";
            case 5:
                return "W";
            case 6:
                return "L";
            case 7:
                return "Q";
            case 8:
                return "B";
            case 9:
                return "J";
            case 0:
                return "L";
        }
    } elseif (ord($s) >= 65 and ord($s) <= 90) {//大写英文开头
        return substr($s, 0, 1);
    } elseif (ord($s) >= 97 and ord($s) <= 122) {//小写英文开头
        return strtoupper(substr($s, 0, 1));
    } else {
        return iconv_substr($s0, 0, 1, 'utf-8');//中英混合的词语提取首个字符即可
    }
}

function telephoneHidden($telephone)
{
    if (!$telephone) {
        return '';
    }
    return substr_replace($telephone, '****', 3, 4);
}

/**
 * 格式转换
 * @param array $fields
 * @param       $data
 * @param array $defaultValue
 */
function null_format($fields = [], &$data, $defaultValue = [])
{
    if ($fields) {
        foreach ($fields as $field) {
            $data[$field] = $data[$field] ?: $defaultValue;
        }
    } else {
        foreach ($data as &$datum) {
            $datum = $datum !== null ? $datum : $defaultValue;
        }
    }
}

function make_order_no(): string
{
    return
        intval(date('Y')) - 2000 .
        date('m') .
        date('d') .
        substr((string)time(), -5) .
        substr((string)microtime(), 4, 4) .
        sprintf('%03d', rand(0, 99));
}

function minusChange($number)
{
    return $number < 0 ? 0 : $number;
}

function makeOrderNoStr($prefix = '')
{
    return str_replace('.', '', uniqid($prefix, true)) . rand(10000, 99999);
}

/**
 * 二维数组指定Key分组
 * @param array $arr
 * @param string $key
 * @return void
 */
function arrayGroupBy(array $arr, string $key)
{
    $grouped = [];
    foreach ($arr as $value) {
        $grouped[$value[$key]][] = $value;
    }
    // Recursively build a nested grouping if more parameters are supplied
    // Each grouped array value is grouped according to the next sequential key
    if (func_num_args() > 2) {
        $args = func_get_args();
        foreach ($grouped as $key => $value) {
            $parms         = array_merge([$value], array_slice($args, 2, func_num_args()));
            $grouped[$key] = call_user_func_array('array_group_by', $parms);
        }
    }
    return $grouped;
}

function isApp()
{
    $accessToken = request()->header('Access-Token');
    $cache       = new UserLoginCache();
    $cacheData   = $cache->getValue($accessToken);

    if (isset($cacheData['type']) && in_array($cacheData['type'], UserLoginEnum::LIMIT_TYPE)) {
        return true;
    }

    return false;
}

function createId()
{
    $sessionId = session_create_id();
    return md5(uniqid() . $sessionId);
}

function idToLabel($id, $data, $idKey = 'id', $nameKey = 'label')
{
    foreach ($data as $item) {
        if($item[$idKey] == $id) {
            return $item[$nameKey];
        }
    }

    return '';
}

if (!function_exists('genJsonRes')) {
    function genJsonRes($code, $data = [], $msg = ''){
        $result = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];

        return $result;
    }
}
if (!function_exists('doubleAdd')) {
    function doubleAdd($beforecoin, $altercoin){
        return number_format($beforecoin + $altercoin,2);
    }
}

