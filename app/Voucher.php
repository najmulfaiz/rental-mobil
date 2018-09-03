<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
    protected $fillable = [
        'kode_voucher',
        'waktu_mulai',
        'waktu_berakhir',
        'max_pemakaian',
        'bentuk',
        'isi',
        'level',
        'status'
    ];
}
