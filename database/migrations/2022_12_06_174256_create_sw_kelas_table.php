<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sw_kelas', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_guru')->unsigned()->nullable();
            $table->integer('id_siswa')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_guru')->references('id')->on('pendidiks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sw_kelas');
    }
}
