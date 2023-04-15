<?php

namespace App\Lib;

use App\Commons\Helper;

/**
 * 双色球数据库
 * https://zhuanlan.zhihu.com/p/516278923
 * https://www.mxnzp.com/doc/list
 */
class SsqLib
{
    private string $url;
    private string $app_id;
    private string $app_secret;

    public function __construct()
    {
        $this->url = 'https://www.mxnzp.com/';
        $this->app_id = 'aupaknitriiopl8x';
        $this->app_secret = 'R01PYjlLMXBtWThZUFdXNm1LTlRydz09';
    }

    /**
     * 最新通用中奖号码信息
     * @throws \Exception
     */
    public function lotteryLatest()
    {
        $api = 'api/lottery/common/latest';
        $path = $this->url . $api;
        $params = [
            'app_id' =>  $this->app_id,
            'app_secret' => $this->app_secret,
            'code' => 'ssq'
        ];

        return Helper::httpRequest($path, $params);
    }
}
