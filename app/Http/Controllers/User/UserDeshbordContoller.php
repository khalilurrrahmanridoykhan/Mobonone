<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDeshbordContoller extends Controller
{


    public function dashbord(){

        return view('auth.layouts2.dashbord2');
    }
}
