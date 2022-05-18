<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Events\AdminNotification;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\order;
use App\Models\User;
use App\Models\Post;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\Lesson;
use App\Http\Controllers\Enum\MessageEnum;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserPostsController extends Controller
{
    public function addPost(){
        $damage = ['لا يوجد', 'سطحي', 'ثانوي'];
        $categories = Category::select()->get();
        return view('client.addAuction',[ 
            'categories'    => $categories, 
            'damage'        => $damage, 
        ]); 
    }
    
    public function showpstedcars(){
        $id=Auth::id();
        $users=User::With('posts')->find($id);
        return view('client.showpstedcars', [
            'users'     => $users
        ]);
    }

    public function save_post(Request $request){
        Validator::validate($request->all(),[
            'carname'=>'required|string|between:3,20',
            'category_id'=>'required',
            'model'=>'required',
            'name_enige'=>'required',
            'start_price' => "required|regex:/^\d+(\.\d{1,2})?$/|not_regex:/[a-z]/",
            'auction_price' => "required|integer|regex:/^\d+(\.\d{1,2})?$/|not_regex:/[a-z]/",
            'address_car' => 'required|string|between:3,50',
            'color'=>'required|string',
            'end_date'=>'required|date|after:now',
            'type_damage'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'images'=>'required',
      
        ],[
            'carname.between'           => $this->messageBetween(3, 20),
            'not_regex'                 => MessageEnum::MESSAGE_NUMBERS,
            'address_car.between'       => $this->messageBetween(3, 50),
            'string'                    => MessageEnum::MESSAGE_STRING,
            'end_date.after'            => 'حقل تاريخ النهاية لازم ان يكون بعد تاريخ البداية',
            'required'                  => MessageEnum::REQUIRED,
            'mimes'                     => MessageEnum::MESSAGE_IMAGES,
        ]);
        $post = new Post;
        $post->name = $request->carname;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->model = $request->model;
        $post->engin_car = $request->name_enige;
        $post->starting_price = $request->start_price;
        $post->auction_ceiling = $request->auction_price;
        $post->address = $request->address_car;
        $post->color = $request->color;
        $post->start_date = now();
        $post->end_date = $request->end_date;
        $post->damage = $request->type_damage;
        $post->description = $request->description;
        $post->end_date = $request->end_date;
        $post->status_car = $request->care_type;
        if($request->hasFile('image'))
          $post->image=$this->uploadFile($request->file('image'));
        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path('images'), $name);  
                $data[] = $name;  
            }
        }
        $post->multiple_image = json_encode($data);
        if($post->save()){
            $userAdmin = $this->roleUsers();
            $lesson = new Lesson;
            $lesson = $this->lessonNotification($userAdmin->id, 'تم اضافة مزاد جديد. من قبل', auth()->user()->name, 'admin_posts');
            if(\Notification::send($userAdmin ,new AdminNotification(Lesson::latest('id')->first()))){
                return back();
            }
            return redirect('postedcars')->with([
                'success'=>MessageEnum::MESSAGE_ADD_SUCCESS
            ]);
        }else{
            return back()->with([
                'error'     => MessageEnum::MESSAGE_ADD_ERROR
            ]);
        }
    }

    public function complate(){
        $order = order::With(['post.auctions','user'])->get();
        $post=Post::with('auctions')->get();
        return view('client.UserComplatePosts', [
            'orders'    => $order,
            'post'      => $post,
        ]);
    }
    
    public function uncomplate(){
        $id=Auth::id();
        $posts=Post::with(['auctions'])->where('user_id',$id)->get();
        return view('client.UserUncomplatePosts', [
            'posts'     => $posts
        ]); 
    }
}
