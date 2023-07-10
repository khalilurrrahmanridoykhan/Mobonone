<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(Request $request){

        $faq = DB::table('faqs')->where('status',1)->orderBy('updated_at', 'ASC')->get();

        $data = compact('faq');

        return view('fontend.faq')->with($data);
    }
}
