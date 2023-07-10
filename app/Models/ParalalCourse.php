<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParalalCourse extends Model
{
    use HasFactory;
    protected $table = "paralal_courses";
    protected $primaryKey = "paralal_courses_id";
}
