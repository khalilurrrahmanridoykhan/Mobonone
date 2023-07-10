<?php

namespace App\Http\Controllers\Admin\mobozone\pages;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;
class EditorBrandContorller extends Controller
{
    public function index(Request $request)
    {
        $brand = Brand::orderBy('created_at', 'DESC');
        // dd($brand);

        if (!empty($request->keyword)) {
            $brand = $brand->where('name', 'like', '%' . $request->keyword . '%');
        }



        $brand = $brand->paginate(15);

        $data['brand'] = $brand;

        return view('admin.mobozone.pages.editorbrandblades.list', $data);
    }

    public function create(Request $request){

        $category = DB::table('models_product_categories')->where('status',1)->orderBy('created_at', 'DESC')->get();
        // dd($category);

        $data['category'] = $category;


        return view('admin.mobozone.pages.editorbrandblades.create', $data);
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
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->category_no = $request->category_no;
            $brand->status = $request->status;
            $brand->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'brand-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/brand/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/brand/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $brand->img = $newFileName;
                $brand->save();


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

        $category = DB::table('models_product_categories')->where('status',1)->orderBy('created_at', 'DESC')->get();
        // dd($category);


        $brand = brand::where('brands_id', $id)->first();

        if(empty($brand)){
            return redirect()->route('admin.blog.index');
        }

        $data['brand'] =  $brand;
        $data['category'] = $category;


        return view('admin.mobozone.pages.editorbrandblades.edit', $data);


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
            $brand =  brand::find($id);

            if(empty($brand)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->category_no = $request->category_no;
            $brand->status = $request->status;
            $brand->save();


            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'brand-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/brand/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/brand/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $brand->img = $newFileName;
                $brand->save();

                // $request->session()->get('success', 'blog Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'Brand Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $brand = Brand::where('brands_id', $id)->delete();

        if(empty($brand)){
            return redirect()->route('editor.brand.index');
        }else{
            return redirect()->route('editor.brand.index');
        }
    }


}
