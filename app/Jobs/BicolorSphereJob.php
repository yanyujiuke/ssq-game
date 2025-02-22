<?php

namespace App\Jobs;

use App\Commons\Helper;
use App\Logic\Game\BicolorSphereLogic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BicolorSphereJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $model = new BicolorSphereLogic();
        $res = $model->findLast();
        // 今日已添加就不在添加了
        if (!$res || $res['date'] != date('Y-m-d')) {
            for ($i = 0; $i < 5; $i++) {
                // 生成6个红球随机数
                $red_arr = Helper::randomArr(33, 1, 6);
                // 生成1个蓝球随机数
                $blue = rand(1, 16);

                // 数据入库
                $model->setData([
                    'date' => date('Y-m-d'),
                    'num' => isset($res['num']) ? $res['num'] + 1 : 1,
                    'red1' => $red_arr[0],
                    'red2' => $red_arr[1],
                    'red3' => $red_arr[2],
                    'red4' => $red_arr[3],
                    'red5' => $red_arr[4],
                    'red6' => $red_arr[5],
                    'blue' => $blue,
                    'lottery_number' => '',
                ]);
            }
            echo '五组数据生成成功！' . PHP_EOL;
        }
    }

}
