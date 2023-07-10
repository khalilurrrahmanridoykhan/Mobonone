<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFacultyAssignment extends Model
{

    use HasFactory;
    protected $table = "course_faculty_assignments";
    protected $primaryKey = "course_faculty_assignments_id";
}
