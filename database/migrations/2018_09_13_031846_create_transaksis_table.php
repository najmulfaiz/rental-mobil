<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penyewa_id');
            $table->integer('mobil_id');
            $table->integer('provinsi_id');
            $table->integer('kota_id');
            $table->string('tempat_jemput');
            $table->string('koordinat_jemput');
            $table->datetime('sewa_mulai');
            $table->datetime('sewa_selesai');
            $table->enum('tujuan', ['drop_off', 'lokasi_awal']);
            $table->enum('tipe_sewa', ['lepas_kunci', 'pakai_driver']);
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
        Schema::dropIfExists('transaksi');
    }
}
