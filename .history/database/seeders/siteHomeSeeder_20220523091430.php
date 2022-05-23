<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class siteHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_home')->insert([
            'main_paragraph'=>'لجميع السيارات والشاحنات المستعملة والجديدة',

            'description'=>'تجعل من السهل على الاعضاء العثور والمزايدة على جميع السيارات.',
            'paragraph_one'=>'تقنية المزاد على كاك مزاد المنصة المحركة لمزادات السيارات عبر الانترنت',
            'paragraph_two'=> 'مع تطور تكنلوجيا مزتد السيارات على الانترنت , كاك مزاد تمكنك من البيع المباشر لسيلرتك او شراء اي سيارة بكل راحة ومن تامنزل او المكتب . على اجهزة الكمبيوتر او الأجهزةالمحمولة , انت تعرف بالفعل كيف التسجيل , تقديم ترخيص التجارة و تسجيل في المزاد'
        ]
           
        );
    }
}
