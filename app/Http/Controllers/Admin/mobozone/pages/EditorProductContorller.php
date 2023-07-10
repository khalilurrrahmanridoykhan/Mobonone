<?php

namespace App\Http\Controllers\Admin\mobozone\pages;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ModelsProductCategories;
use App\Models\Product;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image as ResizeImage;


class EditorProductContorller extends Controller
{
    public function index(Request $request)
    {
        $product = Product::orderBy('created_at', 'DESC');
        // dd($product);

        if (!empty($request->keyword)) {
            $product = $product->where('name', 'like', '%' . $request->keyword . '%');
        }



        $product = $product->paginate(15);

        $data['product'] = $product;

        return view('admin.mobozone.pages.editorproductblades.list', $data);
    }

    public function getcagorydata(Request $request){

        $getcatagory = Brand::where('category_no', $request->id)->get();


        $getbrand = Brand::where('status', 1)->get();

        // dd($getcatagory);
        // return Response::json($getcatagory);


        // foreach ($getbrand as $getbrands) {
        //     if ($totalcridit < 16) {
        //         $totalcridit = $totalcridit + $ifgetterthen15cridits->courses_cridit;
        //     }
        // }


        return response()->json($getcatagory, 200);
    }


    public function create(Request $request){

        $category = DB::table('models_product_categories')->where('status',1)->orderBy('created_at', 'DESC')->get();

        $brand = DB::table('brands')->where('status',1)->orderBy('created_at', 'DESC')->get();

        $data['category'] = $category;
        $data['brand'] = $brand;


        return view('admin.mobozone.pages.editorproductblades.create', $data);
    }

    public function save(Request $request)
    {

        // dd($request->all());
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $product = new product();
            $product->name = $request->name;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->technology = $request->technology;
            $product->twogbands = $request->twogbands;
            $product->threegbands = $request->threegbands;
            $product->fourgbands = $request->fourgbands;
            $product->fivergbands = $request->fivergbands;
            $product->speed = $request->speed;
            $product->announced = $request->announced;
            $product->availablety = $request->availablety;
            $product->dimensions = $request->dimensions;
            $product->weight = $request->weight;
            $product->build = $request->build;
            $product->sim = $request->sim;
            $product->type = $request->type;
            $product->size = $request->size;
            $product->reslution = $request->reslution;
            $product->os = $request->os;
            $product->chipset = $request->chipset;
            $product->cpu = $request->cpu;
            $product->gpu = $request->gpu;
            $product->cardslot = $request->cardslot;
            $product->internal = $request->internal;
            $product->tripple = $request->tripple;
            $product->feature = $request->feature;
            $product->videomain = $request->videomain;
            $product->single = $request->single;
            $product->videoselfie = $request->videoselfie;
            $product->loudspeaker = $request->loudspeaker;
            $product->mmjack = $request->mmjack;
            $product->wlantab = $request->wlantab;
            $product->bluetootht = $request->bluetootht;
            $product->positioning = $request->positioning;
            $product->nfc = $request->nfc;
            $product->radio = $request->radio;
            $product->usb = $request->usb;
            $product->sensor = $request->sensor;
            $product->ballerytype = $request->ballerytype;
            $product->charging = $request->charging;
            $product->color = $request->color;
            $product->model = $request->model;
            $product->sar = $request->sar;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->description = $request->description;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'product-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/product/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(126, 174, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/product/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(187, 225, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $product->img = $newFileName;
                $product->save();


            }

            $request->session()->get('success', 'Product Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'Product Created Successfully.',
            ]);
        }
    }



    public function edit($id, Request $request)
    {

        // $category = DB::table('models_products')->where('status',1)->orderBy('created_at', 'DESC')->get();
        // dd($category);


        $product = product::where('products_id', $id)->first();

        if(empty($product)){
            return redirect()->route('editor.product.index');
        }

        $data['product'] =  $product;
        // $data['category'] = $category;


        return view('admin.mobozone.pages.editorproductblades.edit', $data);


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
            $product =  product::find($id);

            if(empty($product)){
                return response()->json([
                    'status' => 0,
                ]);
            }


            $product->name = $request->name;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->technology = $request->technology;
            $product->twogbands = $request->twogbands;
            $product->threegbands = $request->threegbands;
            $product->fourgbands = $request->fourgbands;
            $product->fivergbands = $request->fivergbands;
            $product->speed = $request->speed;
            $product->announced = $request->announced;
            $product->availablety = $request->availablety;
            $product->dimensions = $request->dimensions;
            $product->weight = $request->weight;
            $product->build = $request->build;
            $product->sim = $request->sim;
            $product->type = $request->type;
            $product->size = $request->size;
            $product->reslution = $request->reslution;
            $product->os = $request->os;
            $product->chipset = $request->chipset;
            $product->cpu = $request->cpu;
            $product->gpu = $request->gpu;
            $product->cardslot = $request->cardslot;
            $product->internal = $request->internal;
            $product->tripple = $request->tripple;
            $product->feature = $request->feature;
            $product->videomain = $request->videomain;
            $product->single = $request->single;
            $product->videoselfie = $request->videoselfie;
            $product->loudspeaker = $request->loudspeaker;
            $product->mmjack = $request->mmjack;
            $product->wlantab = $request->wlantab;
            $product->bluetootht = $request->bluetootht;
            $product->positioning = $request->positioning;
            $product->nfc = $request->nfc;
            $product->radio = $request->radio;
            $product->usb = $request->usb;
            $product->sensor = $request->sensor;
            $product->ballerytype = $request->ballerytype;
            $product->charging = $request->charging;
            $product->color = $request->color;
            $product->model = $request->model;
            $product->sar = $request->sar;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->description = $request->description;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->save();


            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'product-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/product/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/product/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $product->img = $newFileName;
                $product->save();

                // $request->session()->get('success', 'product Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'product Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $product = product::where('products_id', $id)->delete();

        if(empty($product)){
            return redirect()->route('editor.product.index');
        }else{
            return redirect()->route('editor.product.index');
        }
    }


}
