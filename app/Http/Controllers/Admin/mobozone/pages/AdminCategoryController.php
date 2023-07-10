<?php

namespace App\Http\Controllers\admin\mobozone\pages;

use App\Http\Controllers\Controller;
use App\Models\ModelsProductCategories;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image as ResizeImage;


class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = ModelsProductCategories::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $category = $category->where('name', 'like', '%' . $request->keyword . '%');
        }

        $category = $category->paginate(15);

        $data['category'] = $category;

        return view('admin.mobozone.pages.categoryblades.list', $data);
    }

    public function create(){

        return view('admin.mobozone.pages.categoryblades.create');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $category = new ModelsProductCategories();
            $category->category_name = $request->category_name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'category-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/category/thumb/small/' . $newFileName;
                $picture = ResizeImage::make($sourcePath);
                $picture->resize(90, 90, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $picture->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/category/thumb/large/' . $newFileName;
                $picture = ResizeImage::make($sourcePath);
                $picture->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $picture->save($dPath);

                $category->picture = $newFileName;
                $category->save();


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

        $category = ModelsProductCategories::where('id', $id)->first();

        if(empty($category)){
            return redirect()->route('admin.blog.index');
        }

        $data['category'] =  $category;

        return view('admin.mobozone.pages.categoryblades.edit', $data);


    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $category =  ModelsProductCategories::find($id);

            if(empty($category)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $category->category_name = $request->category_name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();


            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'category-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/category/thumb/small/' . $newFileName;
                $picture = ResizeImage::make($sourcePath);
                $picture->resize(90, 90, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $picture->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/category/thumb/large/' . $newFileName;
                $picture = ResizeImage::make($sourcePath);
                $picture->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $picture->save($dPath);

                $category->picture = $newFileName;
                $category->save();

                // $request->session()->get('success', 'blog Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'blog Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $category = ModelsProductCategories::where('id', $id)->delete();

        if(empty($category)){
            return redirect()->route('admin.category.index');
        }else{
            return redirect()->route('admin.category.index');
        }
    }


}
