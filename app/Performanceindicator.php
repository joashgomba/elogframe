<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performanceindicator extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function expectedoutput()
    {
        return $this->belongsTo('App\Expectedoutput');
    }
}
