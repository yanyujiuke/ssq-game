<?php

namespace App\Commons;

use Exception;

class Helper
{
    /**
     * @param int $max 最大随机数
     * @param int $min 最小随机数
     * @param string $amount 随机数个数
     * @return array
     */
    public static function randomArr(int $max, int $min = 0, string $amount = ""): array
    {
        $range = $max - $min;

        if ($amount == null) {
            $amount = $range; // 设定$range默认值
        }

        if ($min >= $max || $amount > $range) {
            return [];
        } else {
            $arr = [];
            for ($i = 0; $i < $range; $i++) {
                $arr[$i] = $i + $min; // 生成固定范围的顺序数
            }

            // 将数组随机打乱
            shuffle($arr);

            if ($range != $amount) {
                // 从后面开始删除多余的数组
                for ($m = 0; $m < $range - $amount; $m++) {
                    $sumKey = count($arr) - 1;
                    unset($arr[$sumKey]);
                }
            }
            sort($arr);
            return $arr;
        }
    }

    /**
     * 返回指定的随机数
     * @param array $arr
     * @param int $num
     * @return array|mixed
     */
    public static function randomArr2(array $arr, int $num): mixed
    {
        $return = [];
        $res = array_rand($arr, $num);
        if (is_array($res)) {
            for ($i = 0; $i < $num; $i++) {
                // var_dump($arr[$res[$i]]);
                $return[] = $arr[$res[$i]];
            }
            return $return;
        } else {
            return $arr[$res];
        }
    }

    /**
     * 发送HTTP请求方法
     * @param string $url 请求URL
     * @param array $params 请求参数
     * @param string $method 请求方法GET/POST
     * @param array $header 请求头
     * @param bool $multi 是否传输文件
     * @return bool|string  $data   响应数据
     * @throws Exception
     */
    public static function httpRequest(string $url, array $params, string $method = 'GET', array $header = [], bool $multi = false)
    {
        $opts = [
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header
        ];
        // 根据请求类型设置特定参数
        switch(strtoupper($method)){
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('不支持的请求方式！');
        }

        // 初始化并执行curl请求
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if($error) {
            throw new Exception('请求发生错误：' . $error);
        }
        return  $data;
    }
}
