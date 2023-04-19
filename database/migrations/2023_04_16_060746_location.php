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
        Schema::create('Locations',function(Blueprint $table){
          $table->id();
          $table->string('image');
          $table->string('name_location');
          $table->string('side_location');
          $table->string('nbr_place_max');
          $table->boolean('isSoldOut')->default(false);
          $table->unsignedBigInteger('stadium_id');
          $table->foreign('stadium_id')->references('id')->on('Stadiums')->onDelete('cascade')->onUpdate('cascade');
          $table->unsignedBigInteger('type_location_id');
          $table->foreign('type_location_id')->references('id')->on('listTypeLocations')->onDelete('cascade')->onUpdate('cascade');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Locations');
    }
};
