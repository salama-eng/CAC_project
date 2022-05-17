<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\MessageEnum;
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
    function addAboutUsContent(Request $request){

        Validator::validate($request->all(),[
            "description"=>['required', 'string', 'min: 30'],
            "paragraph_one"=>['required', 'string', 'between:5, 255'],
            "paragraph_two"=>['required', 'string', 'between:5, 255'],
        ],[
            "required"=>MessageEnum::REQUIRED,
            "string"=>MessageEnum::MESSAGE_STRING,
            "between"=>$this->messageBetween(5, 255),
        ]);

        $home=new about_us;
        $home->description = $request->description;
        $home->paragraph_one = $request->paragraph_one;
        $home->paragraph_two = $request->paragraph_two;

        if($home->save())
        return redirect('manage_about_us')
        ->with(['success'=>MessageEnum::MESSAGE_ADD_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_ADD_ERROR]);
    }

    function editContent(Request $request,$id){
        // return $request;
        $column =  $request->column;
        Validator::validate($request->all(),[
            "$request->column"=>['required', 'string'],
        ],[
            "$request->column.required"=>MessageEnum::REQUIRED,
            "$request->column.string"=>MessageEnum::MESSAGE_STRING,
            ]);

            if($request->column != 'description')
                Validator::validate($request->all(),[
                        "$request->column"=>[ 'between: 5, 255'],
        ],[
        "$request->column.between"=>$this->messageBetween(5, 255)]);

        if($request->column == 'description')
                Validator::validate($request->all(),[
                        "$request->column"=>[ 'min: 20'],
        ],[
        "$request->column.min"=>$this->messageMin(20)]);

        print_r($request->$column) ;
        $home=about_us::find($id);
        $home->$column  = $request->$column;
        if($home->save())
        return redirect('manage_about_us')
        ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
        return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
    }
}
