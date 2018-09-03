<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_voucher');
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_berakhir');
            $table->integer('max_pemakaian');
            $table->enum('bentuk', ['solid', 'persen']);
            $table->float('isi', 0, 0);
            $table->enum('level', ['penyewa', 'rental']);
            $table->enum('status', ['aktif', 'tidak']);
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
        Schema::dropIfExists('vouchers');
    }
}
