<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComments;
use App\Models\Blogs;
use App\Models\Faculty;
use App\Models\HomePageHeroSlide;
use App\Models\ModelsProductCategories;
use App\Models\Product;
use App\Models\Services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $heroslider = HomePageHeroSlide::where('status',1)->orderBy('created_at', 'DESC')->get();


        $blog = Blogs::where('status',1)->orderBy('created_at', 'DESC')->get();

        $product = Product::where('status',1)->orderBy('created_at', 'DESC')->get();


        $catagory = ModelsProductCategories::where('status',1)->orderBy('created_at', 'ASC')->get();


        $data['heroslider'] = $heroslider;
        $data['blog'] = $blog;
        $data['product'] = $product;
        $data['catagory'] = $catagory;






        // dd($data1);

        return view('fontend.mobozone.home',$data);
    }


    public function detail($id){

        $service = Faculty::where('faculties_id', $id)->get();

        if(empty($service)){
            return redirect('/');
        }

        $data['service'] = $service;

        return view('fontend.faculty-detail',$data);
    }
}

