<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesindicatortracking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function county()
    {
        return $this->belongsTo('App\County');
    }

    public function indicatorcategory()
    {
        return $this->belongsTo('App\Indicatorcategory');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rollingplan()
    {
        return $this->belongsTo('App\Rollingplan');
    }

    public function indicators()
    {
        return $this->hasMany('App\Mesindicatortracingindicator');
    }


}
