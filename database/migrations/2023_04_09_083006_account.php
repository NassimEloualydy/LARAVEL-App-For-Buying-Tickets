<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Accounts',function(Blueprint $table){
            $table->id();
            $table->string('id_cart');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image');
            $table->string('email');
            $table->string('pw');
            $table->boolean('isAdmin')->default(false);
            $table->string('phone'); 
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Accounts');
    }
};
