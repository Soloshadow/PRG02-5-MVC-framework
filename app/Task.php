<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillanle = [
        'project_id', 'task',
    ];
    
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
