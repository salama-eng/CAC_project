<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Mail\SendingEmail;
use App\Models\contact_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    function saveMessage(Request $request){
        Validator::validate($request->all(),[
            'name'=>['required','string', 'between: 5, 20'],
            'email'=>['required','email'],
            'message'=>['required', 'min:10',],

        ],[
            'name.required'=>'حقل الاسم مطلوب',
            'message.required'=>'نص الرسالة مطلوب',
            'email.required'=>' حقل الايميل مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 5 الى 20 حرف',
            'message.min'=>' يحب ان يكون  النص اكبر من 10 ',
            'email.unique'=>'اوبس! هذا الايميل موجود مسبقا',
        ]);
        $message = new contact_us;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        if($message->save())
        return back()->with(['success'=>'تم ارسال الرساله بنجاح ']);
        return back()->with(['error'=>'خطاء لم يتم ارسال الرساله ']);
    }

    function showMessage(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $messages = contact_us::select()->where('status',0)->orderBy('id', 'DESC')->get();
        return view('admin.ContactUsMessage', [
            'Messages' => $messages,
            'do'     => $do
        ]);
    }

    function showCompleteMessage(){
        $messages = contact_us::select()->where('status',1)->orderBy('id', 'DESC')->get();
        return view('admin.CompletingMessage', [
            'Messages' => $messages,
        ]);
    }
    function sendMessage(Request $request,$id){

         Validator::validate($request->all(),[
            'send_message'=>['required', 'min: 20'],
        ],[
            'send_message.required'=>' حقل الرسالة مطلوب ',
            'send_message.between'=>' يحب ان يكون حقل الاسم اكبر من 20 حرف',
        ]);

        $sendMessage=$request->send_message;
        $message=contact_us::find($id);
        // print_r($message);
        
        $email_data = array(
                'name' => $message->name, 'email' => $message->email,
                 'message' => $message->message, 'sendMessage' => $sendMessage
            );

        Mail::to($message->email)->send(new SendingEmail($email_data));
            $message->status=1;
            if($message->save()){
            return redirect('manage_message')
        ->with(['success'=>'تم ارسال الرسالة بنجاح']);
        }
        return back()->with(['error'=>'خطاء لانستطيع ارسال الرساله']);

    }   

}
