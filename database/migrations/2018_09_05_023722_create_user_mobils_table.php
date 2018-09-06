<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mobils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nopol', 10);
            $table->integer('brand_id');
            $table->integer('type_id');
            $table->year('tahun_pembuatan');
            $table->string('photo_mobil_1');
            $table->string('photo_mobil_2');
            $table->string('photo_mobil_3');
            $table->string('photo_mobil_4');
            $table->string('photo_mobil_5');
            $table->integer('provinsi_id');
            $table->integer('kota_id');
            $table->string('koordinat_lokasi');
            $table->float('lepas_biasa_1', 0, 0);
            $table->float('lepas_biasa_3', 0, 0);
            $table->float('lepas_biasa_24', 0, 0);
            $table->float('lepas_khusus_1', 0, 0);
            $table->float('lepas_khusus_3', 0, 0);
            $table->float('lepas_khusus_24', 0, 0);
            $table->float('driver_biasa_1', 0, 0);
            $table->float('driver_biasa_3', 0, 0);
            $table->float('driver_biasa_24', 0, 0);
            $table->float('driver_khusus_1', 0, 0);
            $table->float('driver_khusus_3', 0, 0);
            $table->float('driver_khusus_24', 0, 0);
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
        Schema::dropIfExists('user_mobils');
    }
}
