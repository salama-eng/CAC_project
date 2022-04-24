<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\PaymentMethode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class UserProfileController extends Controller
{
 
    public function show()
    {
      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=PaymentMethode::with(['user'])->find($id);
if(isset($user_payment->payment_id)){
      $bank =payment::select()->where('id', $user_payment->payment_id)->first();

   $acount=$user_payment->acount_number;
 
}
      
        return view('client.profile', [
            'user' => $user,
  
        
        ]);

    }




    function showedit(){
 
      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=PaymentMethode::with(['user'])->find($id);

      $bank =payment::select()->where('id', $user_payment->payment_id)->first();
 
      $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
       
      
   $acount=$user_payment->acount_number;
 

      
        return view('client.editprofile', [
            'user' => $user, 
              'acount' => $acount,
              'bank' => $bank,
          
            'do'     => $do
        
        ]);
 
  }



  public function complate_regester()
  {
    return view('client.complate_regester');
  }
    public function save_profile(Request $request){
        Validator::validate($request->all(),[
            'address'=>'required|string|between:3,15',
            'phone'=>'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:9|max:9|starts_with: 77,73,71,70',
            'avatar'=>'required',
            'card'=>'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:14|max:14|starts_with:4444',
        ],[
            'address.required'=>'حقل العنوان مطلوب',
            'phone.required'=>'حقل رقم الموبايل مطلوب',
            'phone.not_regex'=>'لا يمكنك ادخال حروف او رموز',
            'phone.min'=>'يجب ان لا يقل عن 7 ارقام',
            'phone.max'=>'يجب ان لا يزيد عن 7 ارقام',
            'phone.starts_with'=>'يمكنك ادخال 77 او 73 او 71 او 70 في البداية',
            'image.required'=>'حقل الملف مطلوب',
            'card.required'=>'حقل رقم بطاقة الدفع مطلوب',
            'card.not_regex'=>'لا يمكنك ادخال حروف او رموز',
            'card.min'=>'يجب ان لا يقل عن 14 ارقام',
            'card.max'=>'يجب ان لا يزيد عن 14 ارقام',
            'card.starts_with'=>'يمكنك ادخال 4444 في البداية',
        ]);
        // echo $request;
        $profile = new UserProfile;
        if($request->hasFile('avatar'))
          $profile->avatar=$this->uploadFile($request->file('avatar'));
        $profile->address = $request->address;
        $profile->phone = $request->phone;
        
        $profile->card_id = $request->card;
        $profile->user_id  = Auth::id();
        if($profile->save()){
          Auth::user($profile);
          return redirect('profile')
          ->with(['success'=>'تم اضافة بياناتك بنجاح']);
        }else{
          return back()->with(['error'=>'خطاء لانستطيع اضافة بياناتك']);
        }
    }
}
