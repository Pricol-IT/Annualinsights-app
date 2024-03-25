<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "watersource",
        "watersource_other",
        "watergenerated",
        "watergenerated_unit",
        "totalwatergenerated",
        "wastegenerated",
        "wastegenerated_unit",
        "conservation_method",
        "conservation_other",
        "conserved",
        "disposal_method",
        "disposal_other",
        "discharged",
        "discharged_unit",
        "status"
    ];
}
