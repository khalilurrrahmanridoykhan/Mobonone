<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{

    protected $table = "time_slots";
    protected $peimryKey = "time_slots_id";
    use HasFactory;
}
