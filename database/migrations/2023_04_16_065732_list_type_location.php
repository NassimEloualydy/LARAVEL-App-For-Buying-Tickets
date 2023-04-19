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
        Schema::create('listTypeLocations',function(BluePrint $table){
             $table->id();
             $table->unsignedBigInteger('stadium_id');
             $table->foreign('stadium_id')->references('id')->on('Stadiums')->onDelete('cascade')->onUpdate('cascade');
             $table->string('description');
             $table->timestamps();

           });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listTypeLocations');

    }
};
