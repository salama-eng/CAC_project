<?php

namespace App\Http\Controllers\admin;
use App\Models\Models;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModelsAdminController extends Controller
{
    //
    function showAdminModels(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $models = Models::select()->get();
        return view('admin.adminModels', [
            'models' => $models,
            'do'     => $do
        ]);
    }
    function showAdminaddModel(){
        return view('admin.adminModels#addModel');
    }
    function addAdminModel(Request $request){
        Validator::validate($request->all(),[
            'model'=>'required|integer'
        ],[
            'model.required'=>'حقل الاسم مطلوب',
            'model.integer'=>'لا يمكنك ادخال نص يمكنك ادخال ابيانات كارقام',
        ]);
        $modal = new Models;
        $modal->name = $request->model;
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
