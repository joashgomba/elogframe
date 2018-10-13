<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annualworkplan extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function rollingplan()
    {
        return $this->belongsTo('App\Rollingplan');
    }

    public function activities()
    {
        return $this->hasMany('App\Mainactivity');
    }

    public function tasks()
    {
        return $this->hasManyThrough('App\Task', 'App\Mainactivity');
    }


}
