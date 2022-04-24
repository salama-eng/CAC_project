<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthController extends Controller
{
   
    public function listAll(){
        return view('admin.users.list_users');
    }

    public function showLogin(){
        // return view('admin.login');
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('admin.login');
    }

    public function login(Request $request){
    //   return request();
        Validator::extend('checkHashedPass', function($attribute, $value, $parameters)
        {
            if( ! Hash::check( $value , $parameters[0] ) )
            {
                return false;
            }
            return true;
        });
        $password = Hash::make($request->password);
     
      Validator::validate($request->all(),[
            'email'=>['required','email','exists:users,email'],
            'password'=>['required','exists:users,password'],
            'is_active'=>'integer|exists:users,is_active',


        ],[ 
            'email.required'=>'هذا الحقل مطلوب ',
            'email.email'=>'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'password.required'=>'هذا الحقل مطلوب ',
            'password.min'=>'كلمة المرور يجب ان تكون اكثر من 3 احرف',
        ]);

  
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                 if(Auth::user()->hasRole('admin'))
                 return  redirect()->route('admincategories');
                 else 
                 return redirect()->route('profile');
        }else{
            return redirect()->route('login')->with(['message'=>'  عذرا! حسابك قيد التفعيل']);
        }

    }



    public function showregister(){
        return view('front.register');

    }

    public function register(Request $request){

      Validator::validate($request->all(),[
            'name'=>['required','min:3','max:20'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:5'],


        ],[
            'name.required'=>'هذا الحقل مطلوب ',
            'name.min'=>'يجب ان يكوا اكبر من 3 احرف', 
            'email.unique'=>'هذا الايميل غير متاح',
            'email.required'=>'هذا الحقل مطلوب ',
            'email.email'=>'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'password.required'=>'هذا الحقل مطلوب ',
            'password.min'=>'كلمة المرور يجب ان تكون اكثر من 3 احرف',
        ]);

        

        $u=new User();
        $u->name=$request->name;
        $u->password=Hash::make($request->password);
        $u->email=$request->email;
        // $token=Str::uuid();
        // $u->remember_token=$token;

       

        if($u->save()){
        $u->attachRole('client');

        // $email_data=array('name' =>$request->name ,
        // 'activation_url'=>URL::to('/')."/verify_email/".$token);

        // Mail::to($request->email)->send(new VerificationEmail($email_data));
 
        return redirect()->route('login')
        ->with(['success'=>'user created successful']);
    }
        return redirect()->route('register')->with(['message'=>'  لم يتم حفظ المستخدم ']);

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
            return 'admin.login';
        
    }




}
