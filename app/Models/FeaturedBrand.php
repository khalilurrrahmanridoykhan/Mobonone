<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedBrand extends Model
{
    use HasFactory;
    protected $table = "featured_brands";
    protected $primaryKey = "featured_brands_id";
}
