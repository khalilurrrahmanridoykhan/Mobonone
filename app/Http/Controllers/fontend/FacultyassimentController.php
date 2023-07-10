<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyassimentController extends Controller
{
    public function index(){

        $about = DB::table('pages')->where('status',1)->get();
        $blog = DB::table('blogs')->where('status',1)->orderByDesc('created_at', )->get();

        $data = compact('about','blog');

        return view('fontend.about')->with($data);
    }
}
