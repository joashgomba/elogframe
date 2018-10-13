<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function rollingplan()
    {
        return $this->belongsTo('App\Rollingplan');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function annualworkplan()
    {
        return $this->belongsTo('App\Annualworkplan');
    }

    public function mainactivity()
    {
        return $this->belongsTo('App\Mainactivity');
    }

    public function expectedoutput()
    {
        return $this->belongsTo('App\Expectedoutput');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function taskusers()
    {
        return $this->hasMany('App\Taskuser');
    }

    public function taskreportings()
    {
        return $this->hasMany('App\Taskreporting');
    }
}
