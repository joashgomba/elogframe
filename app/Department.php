<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function ministry()
    {
        return $this->belongsTo('App\Ministry');
    }
}
