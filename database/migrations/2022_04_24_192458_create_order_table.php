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
            $table->float('admin_ratio');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->constrained()
                    ->references('id')->on('posts')
                    ->onUpdate('cascade')->onDelete('cascade');

          $table->float('admin_ration')->default(0);

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
        Schema::dropIfExists('order');
    }
};
