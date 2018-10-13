<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
