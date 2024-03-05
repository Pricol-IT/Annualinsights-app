<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "wastetype",
        "wastetype_other",
        "generated",
        "generated_unit",
        "disposaltype",
        "disposed",
        "disposed_unit",
        "status"
    ];
}
