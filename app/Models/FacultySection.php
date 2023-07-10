<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultySection extends Model
{
    protected $table = "faculty_sections";
    protected $primaryKey = "faculty_sections_id";
    use HasFactory;
}
