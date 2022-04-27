<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentsAdminController extends Controller
{
    //
     function showAdminPayments(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $Payments = Payment::select()->get();
        return view('admin.adminPayments', [
            'Payments' => $Payments,
            'do'     => $do
        ]);
    }
    function showAdminaddPayment(){
        return view('admin.adminPayment#addPayment');
    }
    function addAdminPayment(Request $request){
        Validator::validate($request->all(),[
            'Payment'=>'required',
            'bank_name'=>'required'
        ],[
            'Payment.required'=>'حقل الاسم مطلوب',
            'bank_name.required'=>' حقل  البنك مطلوب',
        ]);
        $payment = new Payment;
        $payment->name = $request->Payment;
        $payment->bank_name = $request->bank_name;
        if($payment->save())
        return redirect('adminPayments')
        ->with(['success'=>'تم اضافة طريقة الدفع بنجاح']);
        return back()->with(['error'=>'can not create user']);
    }
    function editAdminPayment(Request $request){
        Validator::validate($request->all(),[
         'Payment'=>'required',
         'bank_name'=>'required'
        ],[
            'Payment.required'=>'حقل الاسم مطلوب',
            'bank_name.required'=>' حقل  البنك مطلوب',
        ]);
        // $payment = new Payment;
        $id = $request->Paymentid;
        $name = $request->Payment;
        $bank_name = $request->bank_name;
        $Payment = Payment::where('id', $id)->update(['name' => $name,'bank_name' => $bank_name]);
        if($Payment)
        return redirect('adminPayments')
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not create user']);
    }
    function activePayment(Request $request){
        $Paymentid = $request->Paymentid;
        $Payment = Payment::select()->where('id', $Paymentid)->find($Paymentid);
        if($Payment->is_active == 1){
            $active = Payment::where('id', $Payment->id)->update(['is_active' => 0]);
        }else{
            $active = Payment::where('id', $Payment->id)->update(['is_active' => 1]);
        }
        return redirect('adminPayments')
            ->with(['success'=>'تم التعديل بنجاح']);
    }

    function deletePayment(Request $request){
    $Paymentid = $request->Paymentid;
    
        $Payment = Payment::select()->where('id', $Paymentid)->delete();
        if($Payment)
        return redirect('adminPayments')
            ->with(['success'=>'تم الحذف بنجاح']);
    }
}