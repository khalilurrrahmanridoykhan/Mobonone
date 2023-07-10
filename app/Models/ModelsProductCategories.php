<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsProductCategories extends Model
{
    use HasFactory;

    protected $table = 'models_product_categories';
    protected $primaryKey = 'id';

}
