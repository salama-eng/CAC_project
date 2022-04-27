<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Models;
use App\Models\order;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserPostsController extends Controller
{
    // required_if:payment_type,cc
    public function addPost(){
      
            $damage = ['لا يوجد', 'سطحي', 'ثانوي'];
            $categories = Category::select()->get();
            $models = Models::select()->orderBy('name', 'ASC')->get();
            return view('client.addAuction',[ 
                'categories'    => $categories, 
                'models'        => $models,
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
            'carname'=>'required|string|between:3,15',
            'category_id'=>'required',
            'model_id'=>'required',
            'name_enige'=>'required',
            'start_price' => "required|regex:/^\d+(\.\d{1,2})?$/|not_regex:/[a-z]/",
            'auction_price' => "required|regex:/^\d+(\.\d{1,2})?$/|not_regex:/[a-z]/",
            'address_car' => 'required|string|between:3,50',
            'color'=>'required|not_regex:/[1-9]/',
            'end_date'=>'required|date|after:now',
            'type_damage'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'images'=>'required',
      
        ],[
            'start_price.not_regex'     =>'السعر البدائي لا يحتوي عن حروف',
            'auction_price.not_regex'   =>'سعر سقف المزايدة لا يحتوي عن حروف ',
            'address_car.between'       =>'حقل العنوان لا يقل عن 3 ولا يزيد 50 حرف',
            'color.not_regex'           =>'حقل اللون لا يقبل ارقام',
            'end_date.after'            =>'حقل تاريخ النهاية لازم ان يكون بعد تاريخ البداية',
            'required'                  =>'هذا الحقل مطلوب',
            'mimes'                     => 'يجب ان يكون الامتداد من نوع صور',
        ]);
        $post = new Post;
        $post->name = $request->carname;
        $post->category_id = $request->category_id;
        $post->user_id  = Auth::id();
        $post->model_id = $request->model_id;
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
            return redirect('postedcars')
            ->with(['success'=>'تم اضافة بياناتك بنجاح']);
        }else{
            return back()->with(['error'=>'خطاء لانستطيع اضافة بياناتك']);
        }
    }

    public function complate(){
       
            $id=Auth::id();

            $order = order::With(['post.auctions','user'])->get();
          $post=Post::with('auctions')->get();
          return $post->auctions[1]->date;
            return view('client.UserComplatePosts', [
                'orders'     => $order,
            ]);
    }
    

    public function uncomplate(){
        $id=Auth::id();

        $auction=Auction::with(['auction_post'])->where('auctions.owner_user_id',$id)->get();
    //  return $auction[0]->auction_post->name;
            $id=Auth::id();
            return view('client.UserUncomplatePosts', [
                'auctions'     => $auction
            ]);
        
    }
}
