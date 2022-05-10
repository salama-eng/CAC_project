<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Mail\VerificationPassword;
use App\Models\ResetPassword;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
// use Illuminate\Foundation\Validation\ValidatesRequests;


class AuthController extends Controller
{

    public function listAll()
    {
        return view('admin.users.list_users');
    }

    public function showLogin()
    {
        // return view('admin.login');
        if (Auth::check())
            return redirect()->route($this->checkRole());
        else
            return view('admin.login');
    }

    public function login(Request $request)
    {
        //   return request();
        Validator::validate($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.required' => ' حقل البريد الالكتروني مطلوب ',
            'email.email' => 'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'email.exists' => 'اوبس! البريد الالكتروني غير موجود',
            'password.required' => ' حقل كلمة السر مطلوب ',
            // 'password.exists' => ' اوبس! كلمة المرور غير صحيحة',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with(['password'=>false, 'password' => 'اوبس! كلمة السر غير صحيحة']);
         }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->hasRole('admin'))
                return redirect()->route('admincategories');
            else
                return redirect()->route('profile');
        } else {
            return redirect()->route('login')->with([
                'message' => '  عذرا! يمكنك  تفعيل حسابك اولا',
            ]);
        }
    }



    public function showregister()
    {
        return view('front.register');
    }

    public function register(Request $request)
    {
        //   return request();

        Validator::validate($request->all(), [
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5'],
            'confirm_pass' => ['same:password']

        ], [
            'name.required' => 'هذا الحقل مطلوب ',
            'name.min' => 'يجب ان يكوا اكبر من 3 احرف',
            'email.unique' => 'هذا الايميل غير متاح',
            'email.required' => 'هذا الحقل مطلوب ',
            'email.email' => 'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'password.required' => 'هذا الحقل مطلوب ',
            'password.min' => 'كلمة المرور يجب ان تكون اكثر من 3 احرف',
            'confirm_pass.same' => 'كلمة المرور غير مطابقة',
        ]);



        $v = $request->password;
        $u = new User();
        $u->name = $request->name;
        $u->password = Hash::make($request->password);
        $u->email = $request->email;
        $token = Str::uuid();
        $u->remember_token = $token;

        // echo $u->name;


        if ($u->save()) {
            $u->attachRole('client');

            // $email_data=array('id'=>$request->id,'name' =>$request->name ,
            // 'activation_url'=>URL::to('/')."/verify_email");

            $email_data = array(
                'name' => $request->name, 'email' => $request->email, 'password' => $v,
                'activation_url' => URL::to('/') . "/verify_email/" . $token . "/".$v
            );

            // print_r ($email_data);
            Mail::to($request->email)->send(new VerificationEmail($email_data));
            // echo 'true';

            return view('mail.resend_email', [
                'email_data' => $email_data,
            ]);
        }
        return  redirect()->route('register')->with(['message' => ' تأكد من كتابة البيانات بالشكل الصحيح ']);
    }

    public function resendEmail(Request $request)
    {
        $email_data = array(
            'name' => $request->name, 'email' => $request->email,
            'activation_url' => $request->activation_url
        );

        Mail::to($request->email)->send(new VerificationEmail($email_data));

        return view('mail.resend_email', [
            'email_data' => $email_data,
        ]);
    }

    public function activeUser($token, $password)
    {
        $user = User::select()->where('remember_token', $token)->first();
        $active = User::where('remember_token', $user->remember_token)->update(['is_active' => 1]);
        $user->is_active = 1;
        // print_r($user->password);
        if (Auth::attempt(['email' => $user->email, 'password' => $password])) {
            if (Auth::user()->hasRole('admin'))
                return redirect()->route('admincategories');
            else
                return redirect()->route('profile');
        } else {
            return redirect()->route('login')
                ->with(['message' => 'اسم المستخدم او كلمة المرور غير صحيحة ']);
        }
    
    } 

    public function showResetPassword(){
        return view('password.writeEmailForResetPassword');
    }

    public function resetPassword(Request $request){
         Validator::validate($request->all(),[
            'email'=>['required','email'],
        ],[
            'email.required'=>'هذا الحقل مطلوب ',
            'email.email'=>'هناك خطأ في كتابة الايميل يرجى التاكد منه',
        ]);

        $e=new ResetPassword();
        $e->email=$request->email;

        $token=Str::uuid();
        $e->token=$token;

        if($e->save()){
        $email_data=array('email'=>$request->email,
        'activation_url'=>URL::to('/')."/verify_password/".$token);

        // print_r ($email_data);
        Mail::to($request->email)->send(new VerificationPassword($email_data));
        }
        return  redirect()->back()->with(['message'=>' يرجى مراجعة الايميل لتستطيع تغيير كلمة المرور ']);
    }

    public function formPassword($token){
        $resetPass = ResetPassword::select()->where('token', $token)->first();
        $userInfo = User::select()->where('email', $resetPass->email)->first();
         return view('password.newPassword', [
            'userInfo' => $userInfo
        ]);
    }
   
    public function newPassword(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'email'=>['required','email'],
            'password'=>['required','min:5'],
            'confirm_pass'=>['same:password']

        ],[
            'email.required'=>'هذا الحقل مطلوب ',
            'email.email'=>'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'password.required'=>'هذا الحقل مطلوب ',
            'password.min'=>'كلمة المرور يجب ان تكون اكثر من 5 احرف',
            'confirm_pass.same'=>'كلمة المرور غير مطابقة',
        ]);

        $id = $request->id;
        $password = Hash::make($request->password);
        $user = User::where('id', $id)->update(['password' => $password]);
        if($user)
        return redirect('login')
        ->with(['message'=>'تم التعديل بنجاح']);
        return redirect('login')->with(['message'=>'لم يتم التعديل']);

    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }

    public function checkRole()
    {
        if (Auth::user()->hasRole('admin'))
            return 'home';
        else
            return 'login';
    }
}
