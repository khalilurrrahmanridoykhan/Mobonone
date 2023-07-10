<?php

namespace App\Http\Controllers\admin\mobozone\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCatagory;
use App\Models\Temp_image_faculty;
use Intervention\Image\Facades\Image as ResizeImage;

class AdminBolgCatagoryController extends Controller
{
    public function index(Request $request)
    {
        $blogcategory = BlogCatagory::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $blogcategory = $blogcategory->where('name', 'like', '%' . $request->keyword . '%');
        }

        $blogcategory = $blogcategory->paginate(15);

        $data['blogcategory'] = $blogcategory;

        return view('admin.mobozone.pages.blogcategoryblades.list', $data);
    }

    public function create(Request $request){

        $blogcategory = BlogCatagory::orderBy('created_at', 'DESC')->get();

        // dd($blogcategory);

        $data['blogcategory'] = $blogcategory;



        return view('admin.mobozone.pages.blogcategoryblades.create', $data);
    }

    public function save(Request $request)
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
            $blogcategory = new BlogCatagory();
            $blogcategory->name = $request->name;
            $blogcategory->description = $request->description;
            $blogcategory->status = $request->status;
            $blogcategory->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blogcategory-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/blogcategory/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(90, 90, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/blogcategory/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $blogcategory->img = $newFileName;
                $blogcategory->save();


            }

            $request->session()->get('success', 'blog Catagory Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'blog Created Successfully.',
            ]);
        }
    }



    public function edit($id, Request $request)
    {

        $blogcategory = BlogCatagory::where('blog_catagories_id', $id)->first();

        if(empty($blogcategory)){
            return redirect()->route('admin.blog.index');
        }

        $data['blogcategory'] =  $blogcategory;

        return view('admin.mobozone.pages.blogcategoryblades.edit', $data);


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
            $blogcategory =  BlogCatagory::find($id);

            if(empty($blogcategory)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $blogcategory->name = $request->name;
            $blogcategory->description = $request->description;
            $blogcategory->status = $request->status;
            $blogcategory->save();


            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blogcategory-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/blogcategory/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(90, 90, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/blogcategory/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $blogcategory->img = $newFileName;
                $blogcategory->save();

                // $request->session()->get('success', 'blog Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'blog Category Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $blogcategory = BlogCatagory::where('id', $id)->delete();

        if(empty($blogcategory)){
            return redirect()->route('admin.blogcategory.index');
        }else{
            return redirect()->route('admin.blogcategory.index');
        }
    }


}

