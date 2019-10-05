<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevTeam extends Model
{
    protected $fillable = [
        'team_name',
    ];

    public function user(){
        return $this->hasMany(User::class); 
    }
}
