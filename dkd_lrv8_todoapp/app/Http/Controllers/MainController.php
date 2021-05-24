<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;
class MainController extends Controller
{
    //
    function Login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6|max:20'
        ]);
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();
        if($save){
            return back()->with('success','New User has been successfully added to database'); 
        }else{
           return back()->with('fail','Something went wrong, try again later'); 
        }
    }
    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ]);
        $userInfo = Admin::where('email','=', $request->email)->first();
        if(!$userInfo){
            return back()->with('fail', 'we do not recognize your email address');
        }
        else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $req = Todo::orderBy('completed')->get();
        return view('admin.dashboard',compact('req'),$data);
    }
    function create(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        
        return view('admin.create',$data);
    }
    function upload(Request $request){
        $request->validate([
            'title' => 'required|max:255'
        ]);
       $todo = $request->title;
        Todo::create(['title' => $todo]);
        return redirect('admin/dashboard');
    }
    function edit($id){
        $todo = Todo::find($id);
        
        return view('admin.edit')->with(['id' => $id, 'todo'=> $todo]);
    }
    function update(Request $request){
        $request->validate([
            'title'=>'required|max:255'
        ]);
        $updateTodo = Todo::find($request->id);
        $updateTodo->update(['title' => $request->title]);
        return redirect('admin/dashboard');
    }
    function completed($id){
        $todo = Todo::find($id);
        if($todo->completed){
            $todo->update(['completed'=>false]);
            return redirect()->back()->with('success' ,'Todo marked as incomplete!');
        }
        else {
            $todo->update(['completed'=>true]);
            return redirect()->back()->with('fail' ,'Todo marked as complete!');
        }
    }
    function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back()->with('fail' ,'Todo deleted Successfully!');

    }
   
}
