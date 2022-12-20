<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('id_guru')->unsigned();
            $table->string('judul');
            $table->string('isi');
            $table->integer('id_komen')->unsigned();
            $table->timestamps();

            $table->foreign('id_guru')->references('id')->on('pendidiks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_komen')->references('id')->on('komen')->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskusi');
    }
}
