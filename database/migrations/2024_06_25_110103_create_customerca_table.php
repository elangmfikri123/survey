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
        Schema::create('customerca', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable(); // Hashids::encode(nik);
            $table->string('tiketicc')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('area')->nullable();
            $table->string('motor')->nullable();
            $table->string('main_dealer')->nullable();
            $table->datetime('waktu')->nullable();
            $table->enum('status', ['Terisi', 'Belum Terisi'])->default('Belum Terisi');
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
        Schema::dropIfExists('customerca');
    }
};
