<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class UserController extends Controller
{
    //
    function index(){
        $req = Admin::all();
          
        return view('admin.dashboard', compact('req'));
    }
}
