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
        Schema::create('Stadiums',function(Blueprint $table){
         $table->id();
         $table->string('name');
         $table->string('image');
         $table->string('contry');
         $table->string('city');
         $table->string('adresse');
         $table->string('barcode');
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Stadiums');
    }
};
