<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    
    public function regency()
    {
        $this->hasMany('App\Regency');
    }
}
