<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_comment extends Model
{
    use HasFactory;
    protected $table = "blog_comments";
    protected $primaryKey = "blog_comments_id";
}
