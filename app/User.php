<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'company_name', 'team_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one to one relationship. User has one level
    // public function level(){
    //     return $this->belongsTo(Level::class);
    // }

    // one to many relationship. User can have many projects. the second argument is to define a specific table name
    public function projects(){
        return $this->belongsToMany(Project::class)->withTimestamps();
    }

    // one to many relationship. User can have many task through projects
    public function projectTasks(){
        return $this->hasManyThrough(Task::class, Project::class);
    }

    // one to many relationship. User can have one role
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
