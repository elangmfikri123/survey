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
            $table->id('id_form');
            $table->foreignId('id_mekanik')->nullable()->constrained('user')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_telp', 20);
            $table->string('no_telp2', 20)->nullable();
            $table->string('kode', 50);
            $table->string('mdname', 20);
            $table->string('nama', 100);
            $table->string('email', 100)->nullable();
            $table->text('akunsosmed')->nullable();
            $table->string('smh', 100);
            $table->string('descmotor', 50);
            $table->text('nomerRangka')->nullable();
            $table->string('jaraktempuh', 20);
            $table->string('nopol', 15);
            $table->string('masalah', 200);
            $table->text('namalokasiahass');
            $table->text('lokasiahass');
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('lat', 50);
            $table->string('lng', 50);
            $table->enum('status', ['N', 'W', 'C']);
            $table->string('tipeservis', 200);
            $table->dateTime('waktu');
            $table->dateTime('waktuisian');
            $table->dateTime('waktu_dikirimmekanik');
            $table->dateTime('waktu_menujukonsumen');
            $table->dateTime('waktu_menanganikonsumen');
            $table->dateTime('waktuselesai');
            $table->enum('statuspenyelesaian', ['Selesai di TKP', 'Dibawa ke AHASS'])->nullable();
            $table->string('tkp1', 200)->nullable();
            $table->string('tkp2', 200)->nullable();
            $table->string('tkp3', 200)->nullable();
            $table->string('ahass1', 200)->nullable();
            $table->string('ahass2', 200)->nullable();
            $table->string('ahass3', 200)->nullable();
            $table->string('part1', 200)->nullable();
            $table->string('part2', 200)->nullable();
            $table->string('part3', 200)->nullable();
            $table->string('part4', 200)->nullable();
            $table->string('part5', 200)->nullable();
            $table->string('alasan1', 200);
            $table->string('alasan2', 200);
            $table->string('alasan3', 200);
            $table->string('alasan4', 200);
            $table->string('alasan5', 200);
            $table->integer('tahunmotor');
            $table->enum('proses', [
                'Data konsumen dikirim ke korlap',
                'Mekanik terima assignment dari korlap',
                'Mekanik menangani konsumen',
                'Selesai dilakukan perbaikan',
                'Mekanik berangkat menuju konsumen'
            ]);
            $table->text('foto')->nullable();
            $table->text('tiketich')->nullable();
            $table->string('approve', 50)->nullable();
            $table->string('problem', 75);
            $table->string('solving', 75);
            $table->text('keteranganSolving');
            $table->text('hasilMasalah');
            $table->string('agentcreator', 50);
            $table->text('rupiah');
            $table->text('rupiah1');
            $table->text('rupiah2');
            $table->text('rupiah3');
            $table->text('rupiah4');
            $table->text('rupiah5');
            $table->text('lat_lng_arrive')->nullable();
            $table->dateTime('waktu_mekanik_call_cust')->nullable();
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
