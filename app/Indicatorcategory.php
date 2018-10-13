<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicatorcategory extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mesindicators()
    {
        return $this->hasMany('App\Mesindicator');
    }

    public function mesindicatortracking()
    {
        return $this->hasMany('App\Mesindicatortracking');
    }
}
