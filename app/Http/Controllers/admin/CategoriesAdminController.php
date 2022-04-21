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
        $categories = Category::select()->orderBy('id', 'DESC')->get();
        return view('admin.adminCategories', [
            'category' => $categories,
            'do'     => $do
        ]);
    }

    function addAdminCategory(Request $request){
      
        Validator::validate($request->all(),[
            'image'=>['required'],
            'name'=>['required','string', 'between: 5, 20', 'unique:categories,name'],
        ],[
            'image.required'=>'حقل الصورة مطلوب',
            'name.required'=>' حقل الاسم مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 5 الى 20 حرف',
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
        ->with(['success'=>'تم اضافة التصنيف بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
    }

    
    function editAdminCategory(Request $request,$id){
        Validator::validate($request->all(),[
            'name'=>['required', 'string', 'between: 5, 20', 'unique:categories,name'],
        ],[
            'name.required'=>' حقل الاسم مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 5 الى 20 حرف',
            'name.unique'=>'اوبس! هناك خطأ في عملية التعديل او ان هذا الاسم موجود مسبقا',
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
