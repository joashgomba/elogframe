<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expectedoutput extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mainactivity()
    {
        return $this->belongsTo('App\Mainactivity');
    }

    public function performanceindicators()
    {
        return $this->hasMany('App\Performanceindicator');
    }
	
	public function performanceindicator()
    {
        return $this->hasOne('App\Performanceindicator');
    }
}
