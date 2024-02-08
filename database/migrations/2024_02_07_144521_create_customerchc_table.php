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
        Schema::create('customerchc', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable(); // Hashids::encode(nik);
            $table->string('tiketicc')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('motor')->nullable();
            $table->string('frame_no')->nullable();
            $table->string('tahun_motor')->nullable();
            $table->string('masalah')->nullable();
            $table->string('tipeservis')->nullable();
            $table->string('status_penyelesaian')->nullable();
            $table->string('main_dealer')->nullable();
            $table->string('nama_ahass')->nullable();
            $table->string('waktu')->nullable();
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
        Schema::dropIfExists('customerchc');
    }
};
