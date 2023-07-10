<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTimeslot extends Model
{
    protected $table = "faculty_timeslots";
    protected $primaryKey = "faculty_timeslots_id";
    use HasFactory;

}
