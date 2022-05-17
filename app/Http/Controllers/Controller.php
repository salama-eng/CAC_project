<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\order;
use App\Models\User;
use App\Models\Post;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\Lesson;
use App\Models\Auction;
use App\Events\NewNotification;
use DB;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function uploadFile($file)
    { 
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return $filename;
    }

    public function roleUsers(){
        $role = Role::where('name', 'admin')->first();
        $roleUser = DB::table('role_user')->where('role_id', $role->id)->first();
        return $user = User::where('id', $roleUser->user_id)->first();
    }

    public function lessonNotification($userId, $message, $username = null, $link){
        $lesson = new Lesson;
        $lesson->user_id = $userId;
        $lesson->title = 'مرحبا';
        $lesson->body = $message;
        $lesson->username = $username;
        $lesson->link = $link;
        return $lesson->save();
    }

    public function walletTransfer($userTransfer, $users, $username, $discount, $message){
        $userTransfer->transfer($users, $discount, [
            'invoice_id' => 200, 
            'details' => $message,
            'username'=> $username,
        ]);
        
    }

    public function walletDeposit($user, $pid_amount, $username){
        $user->deposit($pid_amount, [
            'invoice_id' => 200, 
            'details' => "تم ايداع مبلغ من حساب",
            'username'=> $username,
        ]);
    }

    public function activeAuctionsPayment(){
        $auctions = Auction::where('is_active', 0)->get();
        foreach($auctions as $auction){
        $auction->delete(['is_active' => 0]);
        }
        return redirect('/')
        ->with(['success'=>'فشل في عملية المزايدة ']);
    }

    public function pusherNotifications($users){
        $lesson = new Lesson;
        if(\Notification::send($users ,new NewNotification(Lesson::latest('id')->first()))){
            return back();
        }
    }

    public function messageBetween($min, $max){
        return 'يحب ان يكون الحقل  اكبر من' . $min . ' حرف واصغر من ' . $max . 'حرف';
    }

    public function messageMin($min){
        return 'يجب ان يكوا اكبر من ' . $min . 'احرف';
    }
}
