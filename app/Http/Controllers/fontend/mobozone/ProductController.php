<?php

namespace App\Http\Controllers\fontend\mobozone;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $data['product'] = $product;

        return view('fontend.porduct.allproudct', $data);
    }

    public function detail($id, Request $request)
    {
        // dd($service);

        // $product = Product::where('products_id', $id)->first();
        $product = DB::table('products')->where('products_id', $id)->first();


        // dd($product);
        if (empty($product)) {
            return redirect('/');
        }

        $getsameproduct = DB::table('products')->where('brand_id', $product->brand_id)->where('category_id',  $product->category_id)->where('products_id','!=',$id)->where('status', 1)->get();

        // dd($getsameproduct);

        $data['product'] = $product;
        $data['getsameproduct'] = $getsameproduct;


        // dd($data);

        return view('fontend.porduct.singleproduct',$data);
    }

}
