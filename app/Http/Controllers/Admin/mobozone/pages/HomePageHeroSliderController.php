<?php

namespace App\Http\Controllers\Admin\mobozone\pages;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Controller;
use App\Models\HomePageHeroSlide;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class HomePageHeroSliderController extends Controller
{
    //show all heroslider
    public function index(Request $request)
    {
        $heroslider = HomePageHeroSlide::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $heroslider = $heroslider->where('titile_main', 'like', '%' . $request->keyword . '%');
        }

        $heroslider = $heroslider->paginate(15);

        $data['heroslider'] = $heroslider;

        return view('admin.mobozone.pages.heroslider.herosliderlist', $data);
    }

    public function create()
    {
        return view('admin.mobozone.pages.heroslider.herosliderinput');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
        ]);

        if ($validator->fails()) {
            $request->session()->get('errors', 'heroslider Created Failed.');
            session()->flash('danger', 'Task was Not successful!');

            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $heroslider = new HomePageHeroSlide();
            $heroslider->titile_top = $request->titile_top;
            $heroslider->titile_main = $request->titile_main;
            $heroslider->titile_buttom = $request->titile_buttom;
            $heroslider->status = $request->status;
            $heroslider->save();


            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'heroslider-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/herosliders/fontground/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(220, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/herosliders/fontground/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(235,235, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $heroslider->font_img = $newFileName;
                $heroslider->save();
            }

            if ($request->image_id1 > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id1)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'heroslider-' . $request->image_id1 . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/herosliders/background/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(220, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/herosliders/background/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1200, 320, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $heroslider->bg_img = $newFileName;
                $heroslider->save();
            }

            $request->session()->get('success', 'heroslider Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'heroslider Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {
        $heroslider = HomePageHeroSlide::where('home_page_hero_slides_id', $id)->first();

        if (empty($heroslider)) {
            return redirect()->route('admin.heroslider.index');
        }

        $data['heroslider'] = $heroslider;

        return view('admin.mobozone.pages.heroslider.heroslideredit', $data);
    }
    public function update($id, Request $request)
    {
        $validator = validator($request->all(), [
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $heroslider = HomePageHeroSlide::find($id);

            if (empty($heroslider)) {
                return response()->json([
                    'status' => 0,
                ]);
            }

            $heroslider->titile_top = $request->titile_top;
            $heroslider->titile_main = $request->titile_main;
            $heroslider->titile_buttom = $request->titile_buttom;
            $heroslider->status = $request->status;
            $heroslider->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'heroslider-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/herosliders/fontground/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(220, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/herosliders/fontground/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(235,235, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $heroslider->font_img = $newFileName;
                $heroslider->save();
            }

            if ($request->image_id1 > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id1)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'heroslider-' . $request->image_id1 . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/herosliders/background/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(220, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/herosliders/background/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1200, 320, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $heroslider->bg_img = $newFileName;
                $heroslider->save();


                $request->session()->get('success', 'heroslider Update Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'heroslider Update Successfully.',
                ]);
            }
        }
    }
    public function delete($id, Request $request)
    {
        $heroslider = HomePageHeroSlide::where('home_page_hero_slides_id', $id)->delete();

        if (empty($heroslider)) {
            return redirect()->route('admin.heroslider.index');
        } else {
            return redirect()->route('admin.heroslider.index');
        }
    }
}
