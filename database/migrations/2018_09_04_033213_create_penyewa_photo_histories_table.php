<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyewaPhotoHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewa_photo_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('photo_diri');
            $table->string('photo_ktp');
            $table->string('photo_buku_bank');
            $table->string('photo_sim');
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
        Schema::dropIfExists('penyewa_photo_histories');
    }
}
