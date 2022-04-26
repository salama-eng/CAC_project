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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('message');

            $table->unsignedBigInteger('owner_user_id');
            $table->foreign('owner_user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('aw_user_id');
            $table->foreign('aw_user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('admin_id')->unique();
            $table->foreign('admin_id')->constrained()
                    ->references('id')->on('users')
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
        Schema::dropIfExists('chats');
    }
};
