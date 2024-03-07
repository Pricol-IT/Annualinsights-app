<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        "year",
        "loction",
        "month",
        "attendee",
        "training_topic",
        "training_topic_other",
        "no_of_training",
        "no_of_participants",
        "total_days",
        "total_personnel_covered",
        "status"
    ];
}
