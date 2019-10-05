<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevTeam extends Model
{
    protected $fillable = [
        'position',
    ];

    public function user(){
        return $this->hasMany(User::class); 
    }
}
