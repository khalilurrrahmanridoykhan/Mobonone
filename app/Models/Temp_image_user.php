<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp_image_user extends Model
{
    use HasFactory;
    protected $table = "temp_image_users";
    protected $primaryKey = "temp_image_users_id";
}
