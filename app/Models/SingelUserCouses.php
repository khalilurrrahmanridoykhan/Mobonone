<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingelUserCouses extends Model
{
    use HasFactory;
    protected $table = "singel_user_couses";
    protected $primaryKey = "singel_user_couses_id";
}
