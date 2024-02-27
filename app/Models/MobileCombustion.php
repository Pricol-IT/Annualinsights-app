<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileCombustion extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "vehicletype",
        "vehicletype_other",
        "fueltype",
        "unit",
        "fuelconsumed",
        "Total_distance",
        "status"
    ];
}
