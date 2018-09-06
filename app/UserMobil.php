<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMobil extends Model
{
    protected $table = 'user_mobils';
    protected $fillable = [
        'user_id',
        'nopol',
        'brand_id',
        'type_id',
        'tahun_pembuatan',
        'photo_mobil_1',
        'photo_mobil_2',
        'photo_mobil_3',
        'photo_mobil_4',
        'photo_mobil_5',
        'provinsi_id',
        'kota_id',
        'koordinat_lokasi',
        'lepas_biasa_1',
        'lepas_biasa_3',
        'lepas_biasa_24',
        'lepas_khusus_1',
        'lepas_khusus_3',
        'lepas_khusus_24',
        'driver_biasa_1',
        'driver_biasa_3',
        'driver_biasa_24',
        'driver_khusus_1',
        'driver_khusus_3',
        'driver_khusus_24'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
