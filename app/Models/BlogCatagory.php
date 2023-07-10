<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCatagory extends Model
{
    use HasFactory;
    protected $table = "blog_catagories";
    protected $primaryKey = "blog_catagories_id";

}
