<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskreporting extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mainactivity()
    {
        return $this->belongsTo('App\Mainactivity');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function expectedoutput()
    {
        return $this->belongsTo('App\Expectedoutput');
    }

    public function performanceindicator()
    {
        return $this->belongsTo('App\Performanceindicator');
    }
}
