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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('description');
            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->constrained()
                    ->references('id')->on('site_home')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('about_us_id');
            $table->foreign('about_us_id')->constrained()
                    ->references('id')->on('about_us')
                    ->onUpdate('cascade')->onDelete('cascade');
                    
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
        Schema::dropIfExists('memberships');
    }
};
