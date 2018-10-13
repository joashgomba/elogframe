<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskuser extends Model
{
    protected $table = 'task_user';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
