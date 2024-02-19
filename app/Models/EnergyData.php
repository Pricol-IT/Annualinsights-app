<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyData extends Model
{

    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "fuel_for_diesel_generators",
        "power_from_diesel_generators",
        "electricity",
        "power_purchase_agreement",
        "captive_power"
    ];
}
