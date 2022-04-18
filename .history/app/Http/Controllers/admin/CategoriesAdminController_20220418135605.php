<?php
namespace App\Http\Controllers\admin;
use App\Models\Models;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesAdminController extends Controller
{
    function showAdminCategories(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $categories = Category::select()->get();
        return view('admin.adminCategories', [
            'category' => $categories,
            'do'     => $do
        ]);
    }


    function showAdminaddCategory(){
        return view('admin.adminCategories#addCategory');
    }


    function addAdminCategory(Request $request){
      
     // return $request->file('image');
        Validator::validate($request->all(),[
            'image'=>['required'],
            'name'=>['required','string'],
            

        ],[
            'image.required'=>'حقل الصورة مطلوب',
            'name.required'=>' حقل الاسم مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص',
            

        ]);

        $category = new Category;
        $category->name = $request->name;

        if($request->hasFile('image'))
        $category->image=$this->uploadFile($request->file('image'));

        else  $category->image='defualt.png';
        if($category->active==null)
        $category->is_active=0;
        else 
        $category->is_active=1;
        if($category->save())
        return redirect('admincategories')
        ->with(['success'=>'تم اضافة التصنيف بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
    }

    
    function editAdminCategory(Request $request,$id){


        $category=category::find($id);
        $category->name=$request->name;
       $old=$request->image_old;

       if($request->active==null)
        $category->is_active=0;
        else 
        $category->is_active=1;
        
        if($request->hasFile('image'))
        $category->image=$this->uploadFile($request->file('image'));
        else
        $category->image=$old;
        if($category->save())

      
        return redirect('admincategories')
        ->with(['success'=>'تم تعديل التصنيف بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
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
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not update data']);
        
    }
}
