<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\PaymentMethode;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
      $id=Auth::id();

     // $models = Models::select()->where('id', $modelid)->find($modelid);
      $payment =  PaymentMethode::All();
      $profile = UserProfile::find($id);
    //  return $profile.$payment;
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $payment = Payment::select()->get();
        return view('client.profile', [
            'profile' => $profile, 
              'payment' => $payment,
            'do' => $do
        ]);

    }




    function showedit(Request $request,$id){


  
    
      return redirect('editprofile')
      ->with(['success'=>'تم تعديل التصنيف بنجاح']);
      return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
  }








}
