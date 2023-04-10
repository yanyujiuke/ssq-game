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
            $table->date('date');
            $table->integer('num');
            $table->tinyInteger('red1');
            $table->tinyInteger('red2');
            $table->tinyInteger('red3');
            $table->tinyInteger('red4');
            $table->tinyInteger('red5');
            $table->tinyInteger('red6');
            $table->tinyInteger('blue');
            $table->string('lottery_number')->default('');
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
