<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\MessageEnum;
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
            'name'=>['required','string', 'between: 3, 20'],
            'link'=>['required','string'],
            'icon'=>['required']
        ],[
            'required'          => MessageEnum::REQUIRED,
            'name.between'      => $this->messageBetween(3, 20),
            'name.string'       => MessageEnum::MESSAGE_STRING,
            'link.string'       => MessageEnum::MESSAGE_STRING,
        ]);

        $informartion = new contact_us_info;
        $informartion->name = $request->name;
        $informartion->icon = $request->icon;
        $informartion->link = $request->link;
        return $this->messageRedirectAdd($informartion->save(), 'manage_contact_us');
    }

    
    function editContactUs(Request $request,$id){
        Validator::validate($request->all(),[
            'name'=>['required','string', 'between: 3, 20'],
            'link'=>['required','string'],
            'icon'=>['required']
        ],[
            'required'          =>MessageEnum::REQUIRED,
            'name.between'      =>$this->messageBetween(3, 20),
            'name.string'       =>MessageEnum::MESSAGE_STRING,
            'link.string'       =>MessageEnum::MESSAGE_STRING,
        ]);

        $informartion=contact_us_info::find($id);
        $informartion->name = $request->name;
        $informartion->icon = $request->icon;
        $informartion->link = $request->link;

        if($request->active != null)
            $informartion->is_active = 1;
            
        return $this->messageRedirectUpdate($informartion->save(), 'manage_contact_us');
    }

    function activeContactUs($id){
        $informartion=contact_us_info::find($id);
        if($informartion->is_active==0)
            $informartion->is_active=1;
        else 
            $informartion->is_active=0;
        return $this->messageRedirectUpdate($informartion->save(), 'manage_contact_us');
        
    }
}
