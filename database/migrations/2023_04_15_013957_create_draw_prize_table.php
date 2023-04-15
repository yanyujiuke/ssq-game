<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrawPrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_prize', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique()->default('')->comment('唯一标识');
            $table->string('awards')->default('')->comment('奖项');
            $table->string('condition')->default('')->comment('中奖条件');
            $table->string('desc')->default('')->comment('中奖说明');
            $table->string('bonus')->default('')->comment('中奖金额');
            $table->string('remark')->default('')->comment('备注');
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
        Schema::dropIfExists('draw_prize');
    }
}
