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
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('kode', 100);
            $table->string('nama', 50);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->enum('level', ['ahm', 'agent', 'korlap', 'mekanik']);
            $table->enum('status', ['Aktif', 'Sedang Menangani Konsumen', 'Tidak Aktif']);
            $table->text('token_fcm')->nullable();
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
        Schema::dropIfExists('user');
    }
};
