<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('telp');
            $table->string('alamat');
            $table->string('layanan');
            $table->string('image');
            $table->string('status');
            $table->string('harga');
            $table->string('upload_bukti');
            $table->foreignId('kontraktor_id')->constrained('kontraktors');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('form');
    }
};
