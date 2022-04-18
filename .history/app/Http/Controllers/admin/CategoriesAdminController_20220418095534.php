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
        return view('admin.adminModels', [
            'categories' => $categories,
            'do'     => $do
        ]);
    }


    function showAdminaddCategory(){
        return view('admin.adminCategories#addCategory');
    }


    function addAdminCategory(Request $request){
        Validator::validate($request->all(),[
            'category'=>'required|string'
        ],[
            'category.required'=>'حقل الاسم مطلوب',
            'category.string'=>'لا يمكنك ادخال ارقام يمكنك ادخال ابيانات كنص',
        ]);
        $category = new Category;
        $category->name = $request->model;
        if($modal->save())
        return redirect('adminModels')
        ->with(['success'=>'تم اضافة الموديل بنجاح']);
        return back()->with(['error'=>'can not create user']);
    }
    function editAdminModel(Request $request){
        Validator::validate($request->all(),[
            'model'=>'required|integer'
        ],[
            'model.required'=>'حقل الاسم مطلوب',
            'model.integer'=>'لا يمكنك ادخال نص يمكنك ادخال ابيانات كارقام',
        ]);
        // $modal = new Models;
        $id = $request->modelid;
        $name = $request->model;
        $model = Models::where('id', $id)->update(['name' => $name]);
        if($model)
        return redirect('adminModels')
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not create user']);
    }
    function activeModel(Request $request){
        $modelid = $request->modelid;
        $models = Models::select()->where('id', $modelid)->find($modelid);
        if($models->is_active == 1){
            $active = Models::where('id', $models->id)->update(['is_active' => 0]);
        }else{
            $active = Models::where('id', $models->id)->update(['is_active' => 1]);
        }
        return redirect('adminModels')
            ->with(['success'=>'تم التعديل بنجاح']);
    }
}
