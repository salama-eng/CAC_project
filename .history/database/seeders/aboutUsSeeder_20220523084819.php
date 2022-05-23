<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class aboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert(
            'description'=>'شركة مزاد تأسست في 1982 بواسطة ويليس ج. جونسون، وبدأت كساحة واحدة في كاليفورنيا. الآن يقع المقر الرئيسي في دالاس، تكساس، تعد كوبارت الشركة الرائدة على مستوى العالم في مزادات السيارات على الإنترنت، ووجهة رئيسية لإعادة بيع وإعادة تسويق السيارات. تقنية كوبارت المبتكرة ومنصة المزادات على الإنترنت تربط بين البائعين و لمشترين حول العالم. كوبارت تقوم بتشغيل أكثر من 200 موقع في 11 بلد، وأكثر من 150,000 سيارة للمزاد كل يوم حتى يومنا هذا.',
            'paragraph_one'=>'  تقنية المزاد على كاك مزاد المنصة المحركة لمزادات السيارات عبر الانترنت'
            
        );
    }
}
