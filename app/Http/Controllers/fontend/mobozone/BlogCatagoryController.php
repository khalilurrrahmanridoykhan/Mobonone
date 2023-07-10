<?php

namespace App\Http\Controllers\fontend\mobozone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCatagoryController extends Controller
{
    public function index($id, Request $request)
    {
        // dd($service);

        // $product = Product::where('products_id', $id)->first();
        $blog = DB::table('blogs')->where('blog_catagory_id', $id)->get();


        // dd($blog);
        if (empty($blog)) {
            return redirect('/');
        }

        // $getsameproduct = DB::table('products')->where('brand_id', $product->brand_id)->where('category_id',  $product->category_id)->where('products_id','!=',$id)->where('status', 1)->get();

        // dd($getsameproduct);

        $data['blog'] = $blog;
        // $data['getsameproduct'] = $getsameproduct;


        // dd($data);

        return view('fontend.blogcatagory.allblogs',$data);
    }
}
