<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembagasTable extends Migration
{
    public function up()
    {
        Schema::create('lembagas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_izin_operasional');
            $table->string('nama_lembaga');
            $table->string('nama_pimpinan');
            $table->string('email');
            $table->char('telepon');
            $table->text('deskripsi');
            $table->text('alamat');
            $table->string('foto');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('lembagas');
    }
}
