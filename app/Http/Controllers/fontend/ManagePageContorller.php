<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagePageContorller extends Controller
{
    public function about(Request $request){

        $about = DB::table('pages')->where('status',1)->where('page_id',11)->get();
        $blog = DB::table('blogs')->where('status',1)->orderByDesc('created_at', )->get();

        $data = compact('about','blog');

        return view('fontend.about')->with($data);
    }

    public function privacy(Request $request){

        $privacy = DB::table('pages')->where('status',1)->where('page_id',14)->get();
        $blog = DB::table('blogs')->where('status',1)->orderByDesc('created_at', )->get();

        $data = compact('privacy','blog');


        return view('fontend.privary')->with($data);
    }


       public function terms(Request $request){

        $term = DB::table('pages')->where('status',1)->where('page_id',13)->get();
        $blog = DB::table('blogs')->where('status',1)->orderByDesc('created_at', )->get();

        $data = compact('term','blog');

        // dd($term);

        return view('fontend.terms')->with($data);
    }
}
