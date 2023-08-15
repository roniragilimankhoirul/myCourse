<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nik',16)->unique();
            $table->char('jenis_kelamin',1);
            $table->char('telepon');
            $table->string('email')->nullable();
            $table->text('alamat');
            $table->char('index_lembaga');
            $table->text('program');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
