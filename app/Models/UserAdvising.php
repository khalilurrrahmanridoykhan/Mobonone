<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdvising extends Model
{
    protected $table = "user_advisings";
    protected $primaryKey = "user_advisings_id";
    use HasFactory;
}
