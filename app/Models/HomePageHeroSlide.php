<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageHeroSlide extends Model
{
    use HasFactory;

    protected $table = "home_page_hero_slides";
    protected $primaryKey = "home_page_hero_slides_id";
}
