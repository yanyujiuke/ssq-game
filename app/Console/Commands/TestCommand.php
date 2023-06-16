<?php

namespace App\Console\Commands;

use App\Jobs\BicolorSphereJob;
use App\Jobs\SsqJob;
use App\Lib\SsqLib;
use App\Logic\Game\BicolorSphereLogic;
use App\Logic\Game\SsqHistoryLogic;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 数据入库
        $model = new BicolorSphereLogic();
        $res = $model->findLast();
        if (!$res || $res['date'] != date('Y-m-d')) {
            $model->setData([
                'date' => date('Y-m-d'),
                'num' => isset($res['num']) ? $res['num'] + 1 : 0,
                'red1' => 0,
                'red2' => 1,
                'red3' => 2,
                'red4' => 3,
                'red5' => 4,
                'red6' => 5,
                'blue' => 6,
                'lottery_number' => '',
            ]);
        }
        // BicolorSphereJob::dispatch();
        // SsqJob::dispatch();
        echo time() . PHP_EOL;
    }
}
