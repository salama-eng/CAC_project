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
        Schema::create('payment_methode', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');

            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->constrained()
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('payment_id')->unique();
            $table->foreign('payment_id')->constrained()
                    ->references('id')->on('payments')
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
        Schema::dropIfExists('payment_methodes');
    }
};
