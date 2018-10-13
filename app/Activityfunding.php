<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activityfunding extends Model
{
    protected $table = 'mainactivity_sourceoffunding';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function annualworkplan()
    {
        return $this->belongsTo('App\Annualworkplan');
    }

    public function sourceoffunding()
    {
        return $this->belongsTo('App\Sourceoffunding');
    }
}
