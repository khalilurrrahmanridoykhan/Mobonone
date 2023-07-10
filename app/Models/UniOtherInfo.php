<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniOtherInfo extends Model
{

    protected $table = "uni_other_infos";
    protected $primayKey = "uni_other_infos_id";
    use HasFactory;
}
