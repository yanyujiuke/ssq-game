<?php

namespace App\Jobs;

use App\Lib\SsqLib;
use App\Logic\Game\BicolorSphereLogic;
use App\Logic\Game\SsqHistoryLogic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * 获取双色球开奖号码
 */

class SsqJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $ssqLib;
    private $bicolorSphereLogic;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ssqLib = new SsqLib();
        $this->bicolorSphereLogic = new BicolorSphereLogic();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $model = $this->bicolorSphereLogic;

        $res = $this->ssqLib->lotteryLatest();
        $res = json_decode($res, true);
        if ($res['code'] == 1) {
            // 更新库中的开奖号码
            $date = date('Y-m-d', strtotime($res['data']['time']));
            $str = str_replace(',', ' ', $res['data']['openCode']);
            $str = str_replace('+', ' ', $str);
            $model->updateByWhere(['date' => $date], ['num' => $res['data']['expect'], 'lottery_number' => $str]);

            $input = explode(' ', $str);
            // 判断是否中奖
            $model->getByWhere(['date' => $date])->each(function ($v) use ($input, $model) {
                // 红球中奖数
                $red_num = 0;
                // 蓝球是否中奖
                $blue = false;
                // 中奖等级
                $awards = 0;

                if ($input[0] == $v['red1']) {
                    $red_num++;
                }
                if ($input[1] == $v['red2']) {
                    $red_num++;
                }
                if ($input[2] == $v['red3']) {
                    $red_num++;
                }
                if ($input[3] == $v['red4']) {
                    $red_num++;
                }
                if ($input[4] == $v['red5']) {
                    $red_num++;
                }
                if ($input[5] == $v['red6']) {
                    $red_num++;
                }
                if ($input[6] == $v['blue']) {
                    $blue = true;
                }

                if ($red_num == 6 && $blue) {
                    $awards = 1;
                } elseif ($red_num == 6 && !$blue) {
                    $awards = 2;
                } elseif ($red_num == 5 && $blue) {
                    $awards = 3;
                } elseif (($red_num == 5 && !$blue) || ($red_num == 4 && $blue)) {
                    $awards = 4;
                } elseif (($red_num == 4 && !$blue) || ($red_num == 3 && $blue)) {
                    $awards = 5;
                } elseif (($red_num == 2 && $blue) || ($red_num == 1 && $blue) || (($red_num == 0 && $blue))) {
                    $awards = 6;
                }

                $model->updateByWhere(['id' => $v['id']], ['awards' => $awards]);
            });

            // 添加开奖号码历史记录
            (new SsqHistoryLogic())->setData([
                'open_code' => $res['data']['openCode'],
                'code' => $res['data']['code'],
                'expect' => $res['data']['expect'],
                'name' => $res['data']['name'],
                'time' => $res['data']['time'],
            ]);
        }
    }

}
