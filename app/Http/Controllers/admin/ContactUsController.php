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
            'required'=>MessageEnum::REQUIRED,
            'name.string'=>MessageEnum::MESSAGE_STRING,
            'name.between'=>$this->messageBetween(3, 20),
            'message.min'=>$this->messageMin(10),
        ]);
        $message = new contact_us;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        if($message->save())

        // Email Data
        $email_data = array(
                'name' => $message->name, 'email' => $message->email,
                'phone'=>$request->phone,'messages' => $message->message
            );

        // Sending Email
        try {

         Mail::send('mail.contact_us_message',$email_data, function($message) use ($request){
            $message->from($request->email);
            $message->to('carsauctionwebsite@gmail.com', 'Admin')->subject('رسالة تواصل جديدة');
            return back()->with(['success'=>'تم ارسال الرساله بنجاح ']);
        });

        } catch (\Exception ) {

            return back()->with(['success'=>'خطاء لم يتم ارسال الرساله ']);
        }
        
        
        
    }

}
