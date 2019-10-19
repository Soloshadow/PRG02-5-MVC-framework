<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $fillable = [
        'project_name',
    ];

    public function users(){
        // second argument is to define a specific joined table name.
        return $this->belongsToMany(User::class, 'user_project'); 
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
