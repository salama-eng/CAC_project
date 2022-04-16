<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
   
    public function listAll(){
        return view('admin.users.list_users');
    }

    public function showLogin(){
        return view('admin.login');
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('admin.login');
    }

    public function login(Request $request){
     //  return request();
       // return $request->pass; return $request->email;
  
       // if(Auth::attempt(['email'=>$request->email_username,'password'=>$request->user_pass,'is_active'=>1])){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->pass])){

            
          if(Auth::user()->hasRole('admin'))
            return redirect()->route('dash');
            else 
            return redirect()->route('/');

        
        }
        else {
            return redirect()->route('login')->with(['message'=>'incorerct username or password ']);
        }



    }

    public function createUser(){
        return view('admin.users.create');
    }

    public function register(Request $request){

        Validator::validate($request->all(),[
            'full_name'=>['required','min:3','max:30'],
            'u_email'=>['required','email','unique:users,email'],
            'user_pass'=>['required','min:5'],
            'confirm_pass'=>['same:user_pass']


        ],[
            'full_name.required'=>'this field is required',
            'full_name.min'=>'can not be less than 3 letters', 
            'u_email.unique'=>'there is an email in the table',
            'u_email.required'=>'this field is required',
            'u_email.email'=>'incorrect email format',
            'user_pass.required'=>'password is required',
            'user_pass.min'=>'password should not be less than 3',
            'confirm_pass.same'=>'password dont match',


        ]);

        $u=new User();
        $u->name=$request->full_name;
        $u->password=Hash::make($request->user_pass);
        $u->email=$request->u_email;
        if($u->save())
        return redirect()->route('/')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    public function resetPassword(){

    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }

    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
        return 'dash';
            else 
            return '/';
        
    }




}
