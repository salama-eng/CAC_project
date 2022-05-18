<?php

namespace App\Http\Controllers\admin;
use App\Models\Models;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\MessageEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModelsAdminController extends Controller
{
    //
    function showAdminModels(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $models = Models::select()->orderBy('id', 'DESC')->get();
        return view('admin.adminModels', [
            'models' => $models,
            'do'     => $do
        ]);
    }
    function addAdminModel(Request $request){
        $year = date('Y');
        Validator::validate($request->all(),[
            'model'=>'required|integer|between:1988, "'.$year.'"|unique:models,name',
        ],[
            'required'=>MessageEnum::REQUIRED,
            'model.integer'=>'لا يمكنك ادخال نص يمكنك ادخال ابيانات كارقام',
            'model.between'=>'يمكنك ادخال الموديل من عام 1985 الى عام "'.$year.'"',
            'model.unique'=>'هذا الاسم موجد مسبقا',
        ]);
        $modal = new Models;
        $modal->name = $request->model;
        if($request->active != NULL){
            $modal->is_active = 1;
        }
        if($modal->save())
        return redirect('adminModels')
        ->with(['success'=>MessageEnum::MESSAGE_ADD_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_ADD_ERROR]);
    }

    function editAdminModel(Request $request){
        $year = date('Y');
        Validator::validate($request->all(),[
            'model'=>'required|integer|between:1988, "'.$year.'"|unique:models,name'
        ],[
            'required'=>MessageEnum::REQUIRED,
            'model.integer'=>'لا يمكنك ادخال نص يمكنك ادخال ابيانات كارقام',
            'model.between'=>'يمكنك ادخال الموديل من عام 1985 الى عام "'.$year.'"',
            'model.unique'=>'خطأ في عملية التحديث او ان هذا الاسم موجود مسبقا',
        ]);
        // $modal = new Models;
        $id = $request->modelid;
        $name = $request->model;
        $model = Models::where('id', $id)->update(['name' => $name]);
        if($model)
        return redirect('adminModels')
        ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
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
            ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
    }
}
