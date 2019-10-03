<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'role', 'level'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
