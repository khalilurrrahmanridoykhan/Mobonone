<?php

namespace App\Http\Controllers\user\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAdvisingRulesContoller extends Controller
{
    public function index(Request $request){

        $studentinfo = auth()->user();
        $data['studentinfo'] = $studentinfo;

        return view('user.advisingrules.advingruleslist', $data);
    }
}
