<?php
namespace App\Http\Controllers\admin;
use App\Models\Models;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\MessageEnum;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesAdminController extends Controller
{
    function showAdminCategories(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $categories = Category::select()->orderBy('id', 'DESC')->get();
        return view('admin.adminCategories', [
            'category' => $categories,
            'do'     => $do
        ]);
    }

    function addAdminCategory(Request $request){

        Validator::validate($request->all(),[
            
            'name'=>['required','string', 'between: 5, 20', 'unique:categories,name'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ],[
            'required'=>MessageEnum::REQUIRED,
            'name.string'=>MessageEnum::MESSAGE_STRING,
            'name.between'=>$this->messageBetween(5, 20),
            'name.unique'=>'اوبس! هذا الاسم موجود مسبقا',
        ]);

        $category = new Category;
        $category->name = $request->name;
        if($request->hasFile('image'))
            $category->image=$this->uploadFile($request->file('image'));
        // else  $category->image='defualt.png';
        if($request->active != null){
            $category->is_active=1;
        }
        if($category->save())
        return redirect('admincategories')
        ->with(['success'=>MessageEnum::MESSAGE_ADD_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_ADD_ERROR]);
    }

    
    function editAdminCategory(Request $request,$id){
        Validator::validate($request->all(),[
            'name'=>['required', 'string', 'between: 5, 20'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ],[
            'required'=>MessageEnum::REQUIRED,
            'name.string'=>MessageEnum::MESSAGE_STRING,
            'name.between'=>$this->messageBetween(5, 20),
        ]);
        $category=category::find($id);
        $category->name=$request->name;
        $old=$request->image_old;

        if($request->active != null)
            $category->is_active = 1;
        // else 
        // $category->is_active=1;
        
        if($request->hasFile('image'))
        $category->image=$this->uploadFile($request->file('image'));
        else
        $category->image=$old;
        if($category->save())

        
        return redirect('admincategories')
        ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
    }


    public function uploadFile($files)
    {
        
            $file= $files;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Images'), $filename);
            return $filename;
      

    }

   


    function activeCategory($id){

        $category=category::find($id);
    
        if($category->is_active==0)
        $category->is_active=1;
        else 
        $category->is_active=0;
        if($category->save())
        return redirect('admincategories')
        ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
        
    }
}
