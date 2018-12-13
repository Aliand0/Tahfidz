<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->string('nis');
          $table->string('nama');
          $table->enum('jk', ['L', 'P']);
          $table->integer('kelas_id')->unsigned();
          $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('CASCADE');
          $table->integer('Juz')->default(1);
          $table->integer('halaman')->default(1);
          $table->integer('count')->default(0);
          $table->string('komentar')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
