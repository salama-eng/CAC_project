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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('engin_car');
            $table->date('end_date');
            $table->string('starting_price');
            $table->string('auction_ceiling');
            $table->string('color');
            $table->string('image');
            $table->string('multiple_image');
            $table->string('address');
            $table->string('damage');
            $table->boolean('status_car');
            $table->boolean('status_auction')->default(0);
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
