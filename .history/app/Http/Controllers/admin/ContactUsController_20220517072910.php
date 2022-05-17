<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Mail\SendingEmail;
use App\Models\contact_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Enum\MessageEnum;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Webklex\IMAP\Facades\Client;

class ContactUsController extends Controller
{
    function saveMessage(Request $request){
        Validator::validate($request->all(),[
            'name'=>['required','string', 'between: 3, 20'],
            'email'=>['required','email'],
            'message'=>['required', 'min:10',],

        ],[
            'name.required'=>'حقل الاسم مطلوب',
            'message.required'=>'نص الرسالة مطلوب',
            'email.required'=>' حقل الايميل مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 3 الى 20 حرف',
            'message.min'=>' يحب ان يكون  النص اكبر من 10 ',
            'email.unique'=>'اوبس! هذا الايميل موجود مسبقا',
            'required'=>MessageEnum::REQUIRED,
            'name.string'=>MessageEnum::MESSAGE_STRING,
            'name.between'=>$this->messageBetween(5, 20),
            'message.min'=>$this->messageMin(10),
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

        $allMessage = contact_us::select()->get();
        $replays=[];

        $client = Client::account('default');
        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        $folders = $client->getFolders();
        
        foreach($allMessage as $message){
        
        //Loop through every Mailbox
        foreach($folders as $folder){
            //Get all Messages of the current Mailbox $folder
        $n= $folder->messages()->from("$message->email")->unseen()->count();
        if ($n)
        {  
            $replays = $folder->messages()->from("$message->email")->all()->get();
            $status = contact_us::find( $message->id);
            if($status){
            $status->status=0;
            $status->save();
            }

        }
        }
    }
        // end loop
        return view('admin.ContactUsMessage', [
            'Messages' => $messages,
            'do'     => $do,
            'replays'=> $replays
        ]);
    }

    function showCompleteMessage(){
        $messages = contact_us::select()->where('status',1)->orderBy('id', 'DESC')->get();

        $replays=[];

        $client = Client::account('default');
        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        $folders = $client->getFolders();
        
        foreach($messages as $message){
        
        //Loop through every Mailbox
        foreach($folders as $folder){
            //Get all Messages of the current Mailbox $folder
            $n= $folder->messages()->from("$message->email")->unseen()->count();
        if ($n)
        {  
            $status = contact_us::where('email', $message->email)->update(['status' => 0]);

        }
           else
            $replays = $folder->messages()->from("$message->email")->all()->get();

        }
     
        }
    
        return view('admin.CompletingMessage', [
            'Messages' => $messages,
            'replays'=> $replays

        ]);
    }
    function sendMessage(Request $request,$id){

         Validator::validate($request->all(),[
            'send_message'=>['required', 'min: 10'],
        ],[
<<<<<<< HEAD
            'send_message.required'=>' حقل الرسالة مطلوب ',
            'send_message.between'=>' يحب ان تكون الرسالة اكبر من 10 حرف',
=======
            'send_message.required'=>MessageEnum::REQUIRED,
            'send_message.between'=>$this->messageMin(20),
>>>>>>> pr/72
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

    function statusMessage(Request $request){

        $message=contact_us::find($request->Messageid);
    
        $message->status=1;

        if($message->save())
        return back()
        ->with(['success'=>'تم نقل الرسالة للرسائل التي تم الرد عليها']);
        return back()->with(['error'=>'حدث خطا الانستطيع نقل الرساله']);
        
    }

}
