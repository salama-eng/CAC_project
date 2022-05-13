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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('bid_amount');
            $table->string('bid_total');
            
            $table->unsignedBigInteger('owner_user_id');
            $table->foreign('owner_user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('aw_user_id');
            $table->foreign('aw_user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->constrained()
                    ->references('id')->on('posts')
                    ->onUpdate('cascade')->onDelete('cascade');


            $table->boolean('is_active')->default(0);
            $table->boolean('admin_confirm')->default(0);
            $table->boolean('user_confirm')->default(0);
            $table->boolean('money_confirm')->default(0);
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
        Schema::dropIfExists('auctions');
    }
};
