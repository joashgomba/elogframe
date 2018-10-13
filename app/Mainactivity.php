<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainactivity extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function resultarea()
    {
        return $this->belongsTo('App\Resultarea');
    }

    public function annualworkplan()
    {
        return $this->belongsTo('App\Annualworkplan');
    }

    public function expectedoutputs()
    {
        return $this->hasMany('App\Expectedoutput');
    }

    public function activityfundings()
    {
        return $this->hasMany('App\Activityfunding');
    }

    public function performanceindicators()
    {
        return $this->hasManyThrough('App\Performanceindicator', 'App\Expectedoutput');
    }

    public function sourcesoffunding()
    {
        return $this->belongsToMany('App\Sourceoffunding');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
