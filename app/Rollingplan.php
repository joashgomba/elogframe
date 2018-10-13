<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rollingplan extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function mesindicatortrackings()
    {
        return $this->hasMany('App\Mesindicatortracking');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }


}
