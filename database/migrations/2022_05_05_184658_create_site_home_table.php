<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_home', function (Blueprint $table) {
            $table->id();
            $table->string('main_paragraph')->default('لجميع السيارات والشاحنات المستعملة والجديدة');
            $table->string('description')->default('تجعل من السهل على الاعضاء العثور والمزايدة على جميع السيارات');
            $table->string('paragraph_one')->default('تقنية المزاد على كاك مزاد المنصة المحركة لمزادات السيارات عبر الانترنت');
            $table->string('paragraph_two')->default('مع تطور تكنلوجيا مزتد السيارات على الانترنت , كاك مزاد تمكنك من البيع المباشر لسيلرتك او شراء اي سيارة بكل راحة ومن تامنزل او المكتب . على اجهزة الكمبيوتر او الأجهزةالمحمولة , انت تعرف بالفعل كيف التسجيل , تقديم ترخيص التجارة و تسجيل في المزاد');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_home');
    }
};
