<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listTypeLocation extends Model
{
    use HasFactory;
    protected $table='listTypeLocations';
    protected $fallable=["stadium_id","description"];
}
