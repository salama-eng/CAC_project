<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\siteHome;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Order;
use App\Models\Post;
class AdminHomeController extends Controller
{
    function show()
    {
        $users=User::get()->Count();
        $posts=Post::get()->Count();
        /*** عدد مرات المزايدة */
        $Auctions=Auction::get()->Count();
        $orders=Order::get()->Count();
        $posts_now=Post::where('end_date','>',now())->get()->Count();
        $posts_uncomplate=Post::where('end_date','<',now())->where('status_auction','!=',1)->get()->Count();
       $u= User::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get(['name','created_at']);
        return $u;

        // return $posts_uncomplate;
     return view('admin.dashboard', [
         'posts' => $posts,
         'users' =>$users,
         'Auctions' =>$Auctions,
         'orders' =>$orders,
         'posts_uncomplate' =>$posts_uncomplate,
         'posts_now' =>$posts_now,
         
     ]);
    }

    function manageHome(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $content = siteHome::select()->get();

        return view('admin.adminManageHomeSite', [
            'Content' => $content,
            'do'     => $do
      
     ]);
    }

    function addContent(Request $request){

        Validator::validate($request->all(),[
            "main_paragraph"=>['required', 'string', 'between: 5, 255'],
            "description"=>['required', 'string', 'between: 5, 255'],
            "paragraph_one"=>['required', 'string', 'between: 5, 255'],
            "paragraph_two"=>['required', 'string', 'between: 5, 255'],
        ],[
            "main_paragraph.required"=>' هذا الحقل مطلوب ',
            "paragraph_two.required"=>' هذا الحقل مطلوب ',
            "description.required"=>' هذا الحقل مطلوب ',
            "paragraph_one.required"=>' هذا الحقل مطلوب ',
            "main_paragraph.string"=>' يحب ان يكون هذا الحقل نص  ',
            "description.string"=>' يحب ان يكون هذا الحقل نص  ',
            "paragraph_one.string"=>' يحب ان يكون هذا الحقل نص  ',
            "paragraph_two.string"=>' يحب ان يكون هذا الحقل نص  ',
            "main_paragraph.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',
            "description.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',
            "paragraph_one.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',
            "paragraph_two.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',
            
        ]);
        $home=new siteHome();
        $home->main_paragraph = $request->main_paragraph;
        $home->description = $request->description;
        $home->paragraph_one = $request->paragraph_one;
        $home->paragraph_two = $request->paragraph_two;

        if($home->save())
        return redirect('manage_home')
        ->with(['success'=>'تم الاضافه  بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع الاضفافه ']);
    }

    function editContent(Request $request,$id){
        return $request;
        $column =  $request->column;
        Validator::validate($request->all(),[
            "$request->column"=>['required', 'string', 'between: 5, 255'],
        ],[
            "$request->column.required"=>' هذا الحقل مطلوب ',
            "$request->column.string"=>' يحب ان يكون هذا الحقل نص  ',
            "$request->column.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',]);

     

        $home=siteHome::find($id);

        $home->$column  = $request->$column;
        if($home->save())

        
        return redirect('manage_home')
        ->with(['success'=>'تم التعديل  بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع التعديل ']);
    }
}
