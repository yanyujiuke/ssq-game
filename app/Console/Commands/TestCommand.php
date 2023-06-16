<?php

namespace App\Console\Commands;

use App\Jobs\BicolorSphereJob;
use App\Jobs\SsqJob;
use App\Lib\SsqLib;
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
        BicolorSphereJob::dispatch();
        // SsqJob::dispatch();
        echo time() . PHP_EOL;
    }
}
