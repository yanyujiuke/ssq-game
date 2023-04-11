<?php

namespace App\Console\Commands;

use App\Jobs\BicolorSphereJob;
use Illuminate\Console\Command;

class BicolorSphereCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bicolor:sphere';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成5注双色球号码';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        BicolorSphereJob::dispatch();
    }
}
