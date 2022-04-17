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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('payment_methode_id')->unique();
            $table->foreign('payment_methode_id')->constrained()
                    ->references('id')->on('payment_methode')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('post_id')->unique();
            $table->foreign('post_id')->constrained()
                    ->references('id')->on('posts')
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
        //
    }
};
