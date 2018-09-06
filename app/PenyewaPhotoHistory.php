<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyewaPhotoHistory extends Model
{
    protected $table = 'penyewa_photo_histories';
    protected $fillable = [
        'user_id',
        'photo_diri',
        'photo_ktp',
        'photo_buku_bank',
        'photo_sim'
    ];
}
