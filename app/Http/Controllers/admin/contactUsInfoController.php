<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\contact_us_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class contactUsInfoController extends Controller
{
    function showAdminCategories(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $info = contact_us_info::select()->orderBy('id', 'DESC')->get();
        return view('admin.adminManageContactUsInfo', [
            'Information' => $info,
            'do'     => $do
        ]);
    }

    function addContactUs(Request $request){
      
        Validator::validate($request->all(),[
            'name'=>['required','string', 'between: 5, 20'],
            'link'=>['required','string'],
            'icon'=>['required']
        ],[
            'name.required'=>' حقل الاسم مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 5 الى 20 حرف',
            'link.unique'=>'اوبس! هذا الرابط موجود مسبقا',
            'link.string'=>' يحب ان يكون حقل الرابط نص  ',
            'icon.required'=>'حقل الايقونة مطلوب',

        ]);

        $informartion = new contact_us_info;
        $informartion->name = $request->name;
        $informartion->icon = $request->icon;
        $informartion->link = $request->link;

        if($informartion->save())
        return redirect('manage_contact_us')
        ->with(['success'=>'تم اضافة التصنيف بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
    }

    
    function editContactUs(Request $request,$id){
        Validator::validate($request->all(),[
            'name'=>['required','string', 'between: 5, 20'],
            'link'=>['required','string'],
            'icon'=>['required']
        ],[
            'name.required'=>' حقل الاسم مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 5 الى 20 حرف',
            'link.unique'=>'اوبس! هذا الرابط موجود مسبقا',
            'link.string'=>' يحب ان يكون حقل الرابط نص  ',
            'link.required'=>'حقل الرابط مطلوب',
            'icon.required'=>'حقل الايقونة مطلوب',

        ]);

        $informartion=contact_us_info::find($id);
        $informartion->name = $request->name;
        $informartion->icon = $request->icon;
        $informartion->link = $request->link;

        if($request->active != null)
            $informartion->is_active = 1;
        // else 
        // $informartion->is_active=1;
        
        if($informartion->save())

        
        return redirect('manage_contact_us')
        ->with(['success'=>'تم تعديل التصنيف بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
    }


    function activeContactUs($id){

        $informartion=contact_us_info::find($id);
    
        if($informartion->is_active==0)
        $informartion->is_active=1;
        else 
        $informartion->is_active=0;
        if($informartion->save())
        return redirect('manage_contact_us')
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not update data']);
        
    }
}
