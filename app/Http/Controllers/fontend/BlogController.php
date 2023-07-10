<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\blog_comment;
use App\Models\blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blog = blogs::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $data['blog'] = $blog;

        return view('fontend.blog', $data);
    }

    public function detail($id, Request $request)
    {
        // dd($service);

        $blog = Blogs::where('blogs_id', $id)->get();

        if (empty($blog)) {
            return redirect('/');
        }
        // dd($blog);

        // $data1['blog'] = $blog;

        // $service = Services::where('status', 1)->orderBy('created_at', 'DESC');

        // dd($service);
        // $service = $service->paginate(6);

        // $data['service'] = $service;

        // $blogcomment =  BlogComments::where();
        // $value = $blg;
        $blogcomment = DB::table('blog_comments')->where('blog_id', $id)->where('status', 1)->get();

        // $data['blogcomment'] = $blogcomment;
        // $blogcomment = $blogcomment->paginate(6);

        // $findblog = DB::table('blogs')->find($id);
        $findblog =  blogs::find($id);

        // dd($findblog->blogs_id);

        $blogcommentcoount = blog_comment::where('blog_id',$id)->count();

        $relatedblog = DB::table('blogs')->where('blog_catagory_id',$findblog->blogs)->where('blogs_id', '!=', $findblog->blogs_id)->get();

        $resentblog = DB::table('blogs')->orderBy('created_at', 'DESC')->where('blogs_id', '!=', $findblog->blogs_id)->get();

        $blogcatagory = DB::table('blog_catagories')->orderBy('created_at', 'ASC')->get();

        $data = compact('blogcomment','blog','blogcommentcoount','relatedblog','resentblog','blogcatagory');

        // dd($data);

        return view('fontend.blog-detail')->with($data);
    }

    public function savecomment(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $blogcomment = new blog_comment();
            $blogcomment->name = $request->name;
            $blogcomment->blog_id = $request->blogs_id;
            $blogcomment->comment = $request->comment;
            $blogcomment->save();

            $request->session()->get('success', 'Comment is Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'comment Created Successfully.',
            ]);
        }
    }

    public function showcomment(Request $request){
        // $blogcommentMainPage = new BlogComments();
        // $blogcommentMaindatadb = DB::table('blog_comments')->get();

        return view();
    }


}
