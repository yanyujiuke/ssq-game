<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBicolorSphereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicolor_sphere', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->comment('日期');
            $table->integer('num')->comment('期数');
            $table->tinyInteger('red1')->comment('红球1');
            $table->tinyInteger('red2')->comment('红球2');
            $table->tinyInteger('red3')->comment('红球3');
            $table->tinyInteger('red4')->comment('红球4');
            $table->tinyInteger('red5')->comment('红球5');
            $table->tinyInteger('red6')->comment('红球6');
            $table->tinyInteger('blue')->comment('蓝球');
            $table->string('lottery_number')->default('')->comment('开奖号码');
            $table->string('awards')->default('')->comment('奖项 -1未开奖 0未中奖 1一等奖。。。');
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
        Schema::dropIfExists('bicolor_sphere');
    }
}
