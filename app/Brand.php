<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'name'
    ];

    public function type()
    {
        return $this->hasMany('App\Type');
    }
}
