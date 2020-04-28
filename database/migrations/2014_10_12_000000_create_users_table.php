<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->enum('role', ['admin', 'user']);
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('pekerjaan');
          $table->integer('tanggal');
          $table->string('bulan');
          $table->integer('tahun');
          $table->string('telepon');
          $table->string('address');
          $table->string('kelurahan');
          $table->string('kecamatan');
          $table->string('kabupaten');
          $table->string('provinsi');
          $table->string('gambar');
          $table->string('password');
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
