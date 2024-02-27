<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationaryCombustion extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "equipment",
        "fueltype",
        "fueltype_other",
        "unit",
        "total_comsumption",
        "status"
    ];
}
