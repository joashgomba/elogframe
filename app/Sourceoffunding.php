<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sourceoffunding extends Model
{
    protected $table = 'sourcesoffunding';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function activityfundings()
    {
        return $this->hasMany('App\Activityfunding');
    }

    public function mainactivities()
    {
        return $this->belongsToMany('App\Mainactivity');
    }
}
