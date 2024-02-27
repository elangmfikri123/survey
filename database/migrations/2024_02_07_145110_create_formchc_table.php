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
        Schema::create('formchc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customerc_hc_id')->constrained('customerchc')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('jawaban_1')->nullable();
            $table->string('jawaban_2')->nullable();
            $table->string('jawaban_3')->nullable();
            $table->string('jawaban_4')->nullable();
            $table->string('jawaban_5')->nullable();
            $table->string('jawaban_5a')->nullable();
            $table->string('jawaban_6')->nullable();
            $table->string('jawaban_7')->nullable();
            $table->string('jawaban_8')->nullable();
            $table->string('jawaban_9')->nullable();
            $table->string('jawaban_10')->nullable();
            $table->string('jawaban_11')->nullable();
            $table->string('jawaban_12')->nullable();
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
        Schema::dropIfExists('formchc');
    }
};
