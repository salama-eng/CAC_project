<?php

namespace App\Http\Controllers\Enum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageEnum extends Controller
{
    //
    const REQUIRED                      = "هذا الحقل مطلوب";
    const MESSAGE_ADD_SUCCESS           = "تم الاضافة  بنجاح";
    const MESSAGE_ADD_ERROR             = "خطاء فشلة عملية الاضافة";
    const MESSAGE_UPDATE_SUCCESS        = "تم التعديل  بنجاح";
    const MESSAGE_UPDATE_ERROR          = "خطاء فشلة عملية التعديل";
    const MESSAGE_STRING                = "يحب ان يكون هذا الحقل نص ";
    const MESSAGE_NUMBERS               = "يحب ان يكون هذا الحقل من نوع ارقم ";
    const MESSAGE_IMAGES                = "يجب ان يكون الامتداد من نوع صور";
    const MESSAGE_PAYMENT_SUCCESS       = "تم عملية المزايدة بنجاح";
    const MESSAGE_PAYMENT_ERROR         = "فشل عملية المزايدة ";
}
