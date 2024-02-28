<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FugitiveEmission extends Model
{
    use HasFactory;
    protected $fillable = [
        "year",
        "loction",
        "month",
        "activitytype",
        "gastype",
        "gastype_other",
        "unit",
        "Total_consumed",
        "status"
    ];
}
