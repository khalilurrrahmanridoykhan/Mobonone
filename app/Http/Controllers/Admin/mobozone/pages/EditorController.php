<?php

namespace App\Http\Controllers\Admin\mobozone\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog_comment;
use App\Models\BlogCatagory;
use App\Models\blogs;
use App\Models\Temp_image_faculty;
use Intervention\Image\Facades\Image as ResizeImage;

class EditorController extends Controller
{
    public function index(Request $request)
    {
        $blog = blogs::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $blog = $blog->where('name', 'like', '%' . $request->keyword . '%');
        }

        $blog = $blog->paginate(15);

        $data['blog'] = $blog;

        return view('admin.mobozone.pages.editorblogblades.list', $data);
    }

    public function create(Request $request){

        $blogcategory = BlogCatagory::orderBy('created_at', 'DESC')->get();

        // dd($blogcategory);

        $data['blogcategory'] = $blogcategory;

        return view('admin.mobozone.pages.editorblogblades.create',$data);
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        // dd($request->all());

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $blog = new Blogs();
            $blog->name = $request->name;
            $blog->blog_catagory_id = $request->blog_catagory_id;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/blogs/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $blog->img = $newFileName;
                $blog->save();


            }

            $request->session()->get('success', 'blog Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'blog Created Successfully.',
            ]);
        }
    }



    public function edit($id, Request $request)
    {

        $blogcategory = BlogCatagory::orderBy('created_at', 'DESC')->get();

        // dd($blogcategory);

        $data['blogcategory'] = $blogcategory;

        $blog = blogs::where('blogs_id', $id)->first();

        if(empty($blog)){
            return redirect()->route('editor.blog.index');
        }

        $data['blog'] =  $blog;
        $data['blogcategory'] =  $blogcategory;

        return view('admin.mobozone.pages.editorblogblades.edit', $data);


    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $blog =  blogs::find($id);

            if(empty($blog)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $blog->name = $request->name;
            $blog->blog_catagory_id = $request->blog_catagory_id;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();


            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/blogs/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $blog->img = $newFileName;
                $blog->save();

                // $request->session()->get('success', 'blog Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'blog Created Successfully.',
                ]);
            }


        }
    }
}
