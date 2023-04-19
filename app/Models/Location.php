<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table="Locations";
    protected $fallbale=["image","name_location","side_location","nbr_place_max","isSoldOut","stadium_id","type_location_id"];
    
}
