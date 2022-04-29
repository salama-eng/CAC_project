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
      // $user_payment=User::with(['userPayment'])->find($id);
      //   if(isset($user_payment->userPayment->payment_id)){
      //     $bank =payment::select()->where('id', $user_payment->userPayment->payment_id)->first();
      //   }
        // else
        // $bank="";
        return view('client.profile', [
            'user'          => $user,
        ]);

    }

    function showedit(){
 
      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=User::with('userPayment')->find($id);
      $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
      $acount=$user_payment->userPayment->account_number;
        return view('client.editprofile', [
            'user'    => $user, 
            'acount'  => $acount,          
            'do'      => $do
        ]);
  }



  public function complate_regester()
  {
    $payments = Payment::get();
    return view('client.complate_regester', ['payments' => $payments]);
  }
    public function save_profile(Request $request){
        Validator::validate($request->all(),[
            'address'=>'required|string|between:3,15',
            'phone'=>'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:9|max:9|starts_with:77,73,71,70',
            'avatar'=>'required',
            'card'=>'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:14|max:14|starts_with:4444',
        ],[
            'required'=>'هذا الحقل مطلوب',
            'phone.not_regex'=>'لا يمكنك ادخال حروف او رموز',
            'phone.min'=>'يجب ان لا يقل عن 7 ارقام',
            'phone.max'=>'يجب ان لا يزيد عن 7 ارقام',
            'phone.starts_with'=>'يمكنك ادخال 77 او 73 او 71 او 70 في البداية',
            'card.regex'=>'لا يمكنك ادخال حروف او رموز',
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
        
        $profile->user_id  = Auth::id();
        $payment_methode = new PaymentMethode;
        $payment_methode->account_number = $request->card;
        $payment_methode->payment_id = $request->pank;
        $payment_methode->user_id = Auth::id();
        if($profile->save() && $payment_methode->save()){
          Auth::user($profile);
          return redirect('profile')
          ->with(['success'=>'تم اضافة بياناتك بنجاح']);
        }else{
          return back()->with(['error'=>'خطاء لانستطيع اضافة بياناتك']);
        }
    }

    public function save_edit_profile(Request $request){
      Validator::validate($request->all(),[

          'name'=>'required|string|between:3,15',
          'email'=>'required|email',
          'address'=>'required|string|between:3,15',
          'phone'=>'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:9|max:9|starts_with:77,73,71,70',
          'card'=>'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:14|max:14|starts_with:4444',
      ],[
          'required'=>'هذا الحقل مطلوب',
          'name.between'=>'الاسم لا يزيد عن 15 حرف ولا يقل عن 3 احرف',
          'email.email'=>'البريد الالكتروني غير صحيح',
          'phone.not_regex'=>'لا يمكنك ادخال حروف او رموز',
          'phone.min'=>'يجب ان لا يقل عن 7 ارقام',
          'phone.max'=>'يجب ان لا يزيد عن 7 ارقام',
          'phone.starts_with'=>'يمكنك ادخال 77 او 73 او 71 او 70 في البداية',
          'card.regex'=>'لا يمكنك ادخال حروف او رموز',
          'card.min'=>'يجب ان لا يقل عن 14 ارقام',
          'card.max'=>'يجب ان لا يزيد عن 14 ارقام',
          'card.starts_with'=>'يمكنك ادخال 4444 في البداية',
      ]);
        $name = $request->name;
        $email = $request->email;
        $userSave = User::where('id',Auth::id())->update([
          'name'    => $name,
          'email'   => $email,
        ]);
        $address = $request->address;
        $phone = $request->phone;
        $profileSave = UserProfile::where('user_id', Auth::id())->update([
          'address'   => $address,
          'phone'     => $phone
        ]);
        $account_number = $request->card;
        $payment= PaymentMethode::where('user_id', Auth::id())->update([
          'account_number' => $account_number
        ]);
        if($userSave && $profileSave && $payment){
          return redirect('profile')
          ->with(['success'=>'تم اضافة بياناتك بنجاح']);
        }else{
          return back()->with(['error'=>'خطاء لانستطيع تحديث بياناتك']);
        }
    }

    public function editImageProfile(Request $request){
      Validator::validate($request->all(),[
          'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:6000',
      ],[
          'image.required'  =>'هذا الحقل مطلوب',
          'image.mimes'     => 'يجب ان يكون الامتداد من نوع صور',
      ]);
      if($request->hasFile('image'))
          $image = $this->uploadFile($request->file('image'));
      $imageSave = UserProfile::where('user_id', Auth::id())->update(['avatar' => $image]);
      if($imageSave){
        return redirect('profile')
        ->with(['success'=>'تم اضافة بياناتك بنجاح']);
      }else{
        return back()->with(['error'=>'خطاء لانستطيع تحديث بياناتك']);
      }
    }
}
