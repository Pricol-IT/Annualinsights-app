<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyData extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "no_of_employee",
        "no_of_working_day",
        "last_date_of_accient",
        "first_aid_cases",
        "non_recordable_injury",
        "recordable_injury",
        "man_days_lost",
        "near_miss",
        "no_of_kaizen",
        "ehs_training"
    ];
}
