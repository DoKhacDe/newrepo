<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    function index(){
        $todo = Todo::all();
        return view('admin.dashboard',compact('todo'));
    }
    function create(){
        
    }
    function edit(){
        
    }
}
