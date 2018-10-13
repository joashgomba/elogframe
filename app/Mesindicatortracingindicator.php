<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesindicatortracingindicator extends Model
{
    protected $table = 'mesindicatortracking_mesindicator';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mesindicatortracking()
    {
        return $this->belongsTo('App\Mesindicatortracking');
    }

    public function mesindicator()
    {
        return $this->belongsTo('App\Mesindicator');
    }
}
