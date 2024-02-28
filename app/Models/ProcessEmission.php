<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessEmission extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "processtype",
        "processtype_other",
        "input",
        "input_total_amount",
        "unit",
        "output",
        "output_total_amount",
        "unit",
        "status"
    ];
}
