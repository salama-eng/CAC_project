<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\about_us;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    function manageAboutUs(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $content = about_us::select()->get();
        return view('admin.adminManageAboutUsSite', [
            'Content' => $content,
            'do'     => $do
      
     ]);
    }

    function editContent(Request $request,$id){
        // return $request;
        $column =  $request->column;
        Validator::validate($request->all(),[
            "$request->column"=>['required', 'string', 'min: 20'],
        ],[
            "$request->column.required"=>' هذا الحقل مطلوب ',
            "$request->column.string"=>' يحب ان يكون هذا الحقل نص  ',
            "$request->column.min"=>' يحب ان يكون الحقل  اكبر من 20 حرف  ',]);

            if($request->column != 'description')
                Validator::validate($request->all(),[
                        "$request->column"=>[ 'between: 5, 255'],
        ],[
            "$request->column.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',]);

        print_r($request->$column) ;

        $home=about_us::find($id);

        $home->$column  = $request->$column;
        if($home->save())

        
        return redirect('manage_about_us')
        ->with(['success'=>'تم التعديل  بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع التعديل ']);
    }
}
