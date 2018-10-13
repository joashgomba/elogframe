<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    /**
    protected $fillable = [
        'name', 'location', 'telephone', 'email','postal_address','postal_code','city',
    ];
    **/

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
