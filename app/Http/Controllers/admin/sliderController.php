<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\slider_image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    //
    function showSliderPage(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $slider = slider_image::select()->orderBy('id', 'DESC')->get();
        return view('admin.adminManageSliderImage', [
            'Slider' => $slider,
            'do'     => $do
        ]);
    }


        function addSliderImage(Request $request){
      
        Validator::validate($request->all(),[
            'image'=>['required'],
        ],[
            'image.required'=>'حقل الصورة مطلوب'
        ]);

        $image = new slider_image;
        if($request->hasFile('image'))
            $image->image=$this->uploadFile($request->file('image'));
        if($request->active != null){
            $image->is_active=1;
        }
        if($image->save())
        return redirect('slider_image')
        ->with(['success'=>'تم اضافة الصورة بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة الصورة']);
    }

    function editSliderImage(Request $request,$id){
        Validator::validate($request->all(),[
            'image'=>['required'],
        ],[
            'image.required'=>'حقل الصورة مطلوب'
        ]);

        $image=slider_image::find($id);
        $old=$request->image_old;

        if($request->active != null)
            $image->is_active = 1;
        // else 
        // $image->is_active=1;
        
        if($request->hasFile('image'))
        $image->image=$this->uploadFile($request->file('image'));
        else
        $image->image=$old;
        if($image->save())

        
        return redirect('slider_image')
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

    function activeSliderImage($id){

        $image=slider_image::find($id);
    
        if($image->is_active==0)
        $image->is_active=1;
        else 
        $image->is_active=0;
        if($image->save())
        return redirect('slider_image')
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not update data']);
        
    }
}
