<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mesindicatortrackings()
    {
        return $this->hasMany('App\Mesindicatortracking');
    }
}
