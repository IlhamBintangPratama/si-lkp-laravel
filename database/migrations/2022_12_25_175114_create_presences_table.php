<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->increments('id', true);
            $table->foreignId('user_id')->constrained();
            $table->integer('kehadiran_id')->unsigned();
            $table->date("presence_date");
            $table->time("presence_enter_time");
            $table->time("presence_out_time")->nullable();
            $table->timestamps();

            $table->foreign('kehadiran_id')->references('id')->on('kehadiran')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }
}
