<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\membership;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class membershipController extends Controller
{
    //
    function showMembership(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $member = membership::select()->orderBy('id', 'DESC')->get();
        return view('admin.adminManagemembership', [
            'memberships' => $member,
            'do'     => $do
        ]);
    }


        function addMembership(Request $request){
      
        Validator::validate($request->all(),[
            'name'=>'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'image'=>['required'],
            'address'=>'required',
            'phone'=>'required',
        ],[
            'name.required'=>'حقل الاسم مطلوب',
            'email.unique' => 'هذا الايميل غير متاح',
            'email.required' => 'هذا الحقل مطلوب ',
            'email.email' => 'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'image.required'=>'حقل الصورة مطلوب',
            'address.required'=>'حقل العنوان مطلوب',
            'phone.required'=>'حقل الهاتف مطلوب'
        ]);

        $member = new membership();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->description = $request->description;
        if($request->hasFile('image'))
            $member->image=$this->uploadFile($request->file('image'));
        if($request->active != null){
            $member->is_active=1;
        }
        if($member->save())
        return redirect('membership')
        ->with(['success'=>'تم اضافة الصورة بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة الصورة']);
    }

    function editMembership(Request $request,$id){
        Validator::validate($request->all(),[
            'name'=>'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'image'=>['required'],
        ],[
            'name.required'=>'حقل الاسم مطلوب',
            'email.unique' => 'هذا الايميل غير متاح',
            'email.required' => 'هذا الحقل مطلوب ',
            'email.email' => 'هناك خطأ في كتابة الايميل يرجى التاكد منه',
            'image.required'=>'حقل الصورة مطلوب'
        ]);

        $member=membership::find($id);
        $old=$request->image_old;

        if($request->active != null)
            $member->is_active = 1;
        // else 
        // $image->is_active=1;
        
        $member->name = $request->name;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->description = $request->description;
        if($request->hasFile('image'))
        $member->image=$this->uploadFile($request->file('image'));
        else
        $member->image=$old;
        if($member->save())

        
        return redirect('membership')
        ->with(['success'=>'تم تعديل الصزوة بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع تعديل الصورة']);
    }

    public function uploadFile($files)
    {
        
            $file= $files;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Images'), $filename);
            return $filename;
      

    }

    function activeMembership($id){

        $member=membership::find($id);
    
        if($member->is_active==0)
        $member->is_active=1;
        else 
        $member->is_active=0;
        if($member->save())
        return redirect('membership')
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not update data']);
        
    }
}
