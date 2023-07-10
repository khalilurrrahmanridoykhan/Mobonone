<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterDrop extends Model
{
    use HasFactory;
    protected $table = "semester_drops";
    protected $primaryKey = "semester_drops_id";
}
