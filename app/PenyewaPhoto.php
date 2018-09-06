<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyewaPhoto extends Model
{
    protected $table = 'penyewa_photos';
    protected $fillable = [
        'user_id',
        'photo_diri',
        'photo_ktp',
        'photo_buku_bank',
        'photo_sim'
    ];
}
