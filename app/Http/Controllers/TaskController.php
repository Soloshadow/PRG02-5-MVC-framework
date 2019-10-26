<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function store(Request $request, $project){
        dd($request->input('task'));
    }
    
}
