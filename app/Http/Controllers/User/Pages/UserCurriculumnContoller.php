<?php

namespace App\Http\Controllers\user\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCurriculumnContoller extends Controller
{
    public function index(){
        return view('user.curriculumn.curriculumnlist');
    }
}
