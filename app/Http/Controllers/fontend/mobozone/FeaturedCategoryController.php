<?php

namespace App\Http\Controllers\fontend\mobozone;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturedCategoryController extends Controller
{
    public function index($id, Request $request)
    {
        // dd($service);

        // $product = Product::where('products_id', $id)->first();
        $product = DB::table('products')->where('category_id', $id)->get();


        // dd($product);
        if (empty($product)) {
            return redirect('/');
        }

        // $getsameproduct = DB::table('products')->where('brand_id', $product->brand_id)->where('category_id',  $product->category_id)->where('products_id','!=',$id)->where('status', 1)->get();

        // dd($getsameproduct);

        $data['product'] = $product;
        // $data['getsameproduct'] = $getsameproduct;


        // dd($data);

        return view('fontend.featuredcategory.allproudct',$data);
    }
}
