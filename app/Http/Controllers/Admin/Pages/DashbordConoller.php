<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Admin\mobozone\pages\HomePageHeroSliderController;
use App\Http\Controllers\Controller;
use App\Models\BlogCatagory;
use App\Models\blogs;
use App\Models\Brand;
use App\Models\Course;
use App\Models\CourseFacultyAssignment;
use App\Models\Faculty;
use App\Models\HomePageHeroSlide;
use App\Models\ModelsProductCategories;
use App\Models\ParalalCourse;
use App\Models\Product;
use App\Models\Section;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class DashbordConoller extends Controller
{
    public function dashbord(){

        $pordut = Product::count();
        $blog = blogs::count();
        $blogcatagoty = BlogCatagory::count();
        $brand = Brand::count();
        $productcatagory = ModelsProductCategories::count();
        $heroslider = HomePageHeroSlide::count();

        $data['pordut'] = $pordut;
        $data['blog'] = $blog;
        $data['blogcatagoty'] = $blogcatagoty;
        $data['brand'] = $brand;
        $data['productcatagory'] = $productcatagory;
        $data['heroslider'] = $heroslider;

        return view('admin.pages.dashbord.index', $data);
    }
}
