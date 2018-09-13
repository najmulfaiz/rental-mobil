<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'penyewa_id',
        'mobil_id',
        'provinsi_id',
        'kota_id',
        'tempat_jemput',
        'koordinat_jemput',
        'sewa_mulai',
        'sewa_selesai',
        'tujuan',
        'tipe_sewa'
    ];

    public function penyewa()
    {
        return $this->belongsTo('App\User', 'penyewa_id');
    }

    public function mobil()
    {
        return $this->belongsTo('App\UserMobil');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Province');
    }

    public function kota()
    {
        return $this->belongsTo('App\Regency');
    }

    public function getLatAttribute()
    {
        $koordinat = str_replace(['[', ']'], '', $this->koordinat_jemput);
        $koordinat = explode(',', $koordinat);
        return $koordinat[0];
    }

    public function getLngAttribute()
    {
        $koordinat = str_replace(['[', ']'], '', $this->koordinat_jemput);
        $koordinat = explode(',', $koordinat);
        return $koordinat[1];
    }

    public function getDurasiAttribute()
    {
        $start = Carbon::parse($this->sewa_mulai);
        $end = Carbon::parse($this->sewa_selesai);
        $hours = $end->diffInHours($start);
        $seconds = $end->diffInSeconds($start);

        return $hours . ' jam';
    }
}
