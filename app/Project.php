<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $fillable = [
        'user_id', 'project_name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }
}
