<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskmilestone extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
