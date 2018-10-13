<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function division()
    {
        return $this->belongsTo('App\Division');
    }
    public function annualworkplans()
    {
        return $this->hasMany('App\Annualworkplan');
    }

    public function activities()
    {
        return $this->hasManyThrough('App\Mainactivity', 'App\Annualworkplan');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
