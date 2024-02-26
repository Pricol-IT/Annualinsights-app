<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWorkerBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "benefits",
    ];
}
