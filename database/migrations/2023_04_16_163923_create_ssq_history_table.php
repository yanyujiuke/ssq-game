<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSsqHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssq_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('open_code')->default('')->comment('开奖号码');
            $table->string('code')->default('')->comment('ssq：双色球，qlc：七乐彩，fc3d：福彩3D，cjdlt：超级大乐透，qxc：七星彩，pl3：排列3，pl5：排列(5)');
            $table->string('expect')->default('')->comment('期数');
            $table->string('name')->default('')->comment('名称');
            $table->string('time')->default('')->comment('时间');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssq_history');
    }
}
