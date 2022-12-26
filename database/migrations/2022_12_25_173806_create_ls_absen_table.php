<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLsAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_absen', function (Blueprint $table) {
            $table->increments('id', true);
            $table->foreignId('user_id')->constrained();
            $table->integer('kehadiran_id')->unsigned();
            $table->string('title');
            $table->string('description', 500);
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
        Schema::dropIfExists('ls_absen');
    }
}
