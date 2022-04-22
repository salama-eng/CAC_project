<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Models;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserPostsController extends Controller
{
    public function addPost(){
        if (isset(Auth::user()->profile->id)){
            $categories = Category::select()->get();
            $models = Models::select()->get();
            return view('client.addAuction',[ 
                'categories' => $categories, 
                'models' => $models, 
            ]);
        }else{
            return redirect('profile');
        }
        
    }
    
    public function showpstedcars(){
        if (isset(Auth::user()->profile->id)){
            $id=Auth::id();
            $users=User::With('posts')->find($id);

            $categories = Category::select()->get();
            return view('client.showpstedcars', [
                'users'     => $users,
            ]);
        }else{
            return redirect('profile');
        }
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
            'image'=>'required',
            'images'=>'required',
            'care_type'=>'required',
        ],[
            'carname.required'=>'حقل اسم السيارة مطلوب',
            'category_id.required'=>'حقل الصنف مطلوب',
            'model_id.required'=>'حقل الموديل مطلوب',
            'name_enige.required'=>'حقل المحرك مطلوب',
            'start_price.required'=>'حقل السعر البدائي مطلوب',
            'start_price.not_regex'=>'السعر البدائي لا يحتوي عن حروف',
            'auction_price.required'=>'حقل سعر المزايدة مطلوب',
            'auction_price.not_regex'=>'سعر سقف المزايدة لا يحتوي عن حروف ',
            'address_car.required'=>'حقل العنوان مطلوب',
            'address_car.between'=>'حقل العنوان لا يقل عن 3 ولا يزيد 50 حرف',
            'color.required'=>'حقل اللون مطلوب',
            'color.not_regex'=>'حقل اللون لا يقبل ارقام',
            'end_date.required'=>'حقل تاريخ النهاية مطلوب',
            'end_date.after'=>'حقل تاريخ النهاية لازم ان يكون بعد تاريخ البداية',
            'type_damage.required'=>'حقل الضرر مطلوب',
            'description.required'=>'حقل الوصف مطلوب',
            'image.required'=>'حقل الصورة مطلوب',
            'images.required'=>'حقل الصور مطلوب',
            'care_type.required'=>'حقل حالة السيارة مطلوب',
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
        if (isset(Auth::user()->profile->id)){
            $id=Auth::id();
            $users = User::With('posts')->find($id);
            return view('client.UserComplatePosts', [
                'users'     => $users
            ]);
        }else{
            return redirect('profile');
        }
    }

    public function uncomplate(){
        if (isset(Auth::user()->profile->id)){
            $id=Auth::id();
            $users = User::With('posts')->find($id);
            return view('client.UserUncomplatePosts', [
                'users'     => $users
            ]);
        }else{
            return redirect('profile');
        }
    }
    public function uploadFile($files)
    { 
        $file= $files;
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return $filename;
    }
    

}
