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
            $table->string('code')->unique()->default('');
            $table->string('awards')->default('');
            $table->string('condition')->default('');
            $table->string('desc')->default('');
            $table->string('bonus')->default('');
            $table->string('remark')->default('');
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
