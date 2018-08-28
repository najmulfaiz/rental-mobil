<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'name',
        'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
