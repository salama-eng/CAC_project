<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
// use Illuminate\Foundation\Validation\ValidatesRequests;


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
     
      Validator::validate($request->all(),[
            'email'=>['required','email','exists:users,email'],
            'password'=>['required','exists:users,password'],
            'is_active'=>'integer|exists:users,is_active',


        ],[ 
            'email.required'=>' حقل البريد الالكتروني مطلوب ',
            'email.email'=>'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'email.exists'=>'اوبس! البريد الالكتروني غير موجود',
            'password.required'=>' حقل كلمة السر مطلوب ',
            'password.exists' => ' اوبس! كلمة المرور غير صحيحة',
            'is_active.exists'=>'عذرا! حسابك قيد التفعيل',
        ]);

  
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                 if(Auth::user()->hasRole('admin'))
                 return redirect()->route('admincategories');
                 else 
                 return redirect()->route('profile');
        }else{
            return redirect()->route('login')->with(['message'=>'  لم يتم حفظ المستخدم ']);
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
            'confirm_pass'=>['same:password']

        ],[
            'name.required'=>'هذا الحقل مطلوب ',
            'name.min'=>'يجب ان يكوا اكبر من 3 احرف', 
            'email.unique'=>'هذا الايميل غير متاح',
            'email.required'=>'هذا الحقل مطلوب ',
            'email.email'=>'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'password.required'=>'هذا الحقل مطلوب ',
            'password.min'=>'كلمة المرور يجب ان تكون اكثر من 3 احرف',
            'password.min'=>'كلمة المرور يجب ان تكون اكثر من 3 احرف',
            'confirm_pass.same'=>'كلمة المرور غير مطابقة',
        ]);

        

        $u=new User();
        $u->name=$request->name;
        $u->password=Hash::make($request->password);
        $u->email=$request->email;
        // $token=Str::uuid();
        // $u->remember_token=$token;

       

        if($u->save()){
        $u->attachRole('client');

        // $email_data=array('id'=>$request->id,'name' =>$request->name ,
        // 'activation_url'=>URL::to('/')."/verify_email");

        // Mail::to($request->email)->send(new VerificationEmail($email_data));
 
        return redirect()->route('login')
        ->with(['success'=>'user created successful']);
    }
        return redirect()->route('register')->with(['message'=>'  لم يتم حفظ المستخدم ']);

    }


    public function activeUser(Request $request){
        $userId = $request->id;
        $user = User::select()->where('id', $userId)->find($userId);
            $active = User::where('id', $user->id)->update(['is_active' => 1]);

        return redirect()->route('login')
            ->with(['success'=>'تم التعديل بنجاح']);
    
    } 

    public function resetPassword(){

    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }

    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
            return 'home';
        else 
            return 'login';
        
    }




}