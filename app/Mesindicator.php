<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesindicator extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function indicatorcategory()
    {
        return $this->belongsTo('App\Indicatorcategory');
    }
}
