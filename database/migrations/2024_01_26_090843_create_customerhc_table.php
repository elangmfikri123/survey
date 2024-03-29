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
        Schema::create('customerhc', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable(); // Hashids::encode(nik);
            $table->string('nik')->nullable();
            $table->string('name')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('phone')->nullable();
            $table->string('motor')->nullable();
            $table->string('frame_no')->nullable();
            $table->string('main_dealer')->nullable();
            $table->string('dealer_code')->nullable();
            $table->date('sales_date')->nullable();
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
        Schema::dropIfExists('customerhc');
    }
};
