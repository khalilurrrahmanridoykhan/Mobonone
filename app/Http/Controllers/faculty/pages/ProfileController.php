<?php

namespace App\Http\Controllers\faculty\pages;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Instructor;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;

class ProfileController extends Controller
{
    public function editprofileindex(Request $request)
    {
        $instructor = Instructor::where(
            'id',
            auth()
                ->guard('faculty')
                ->user()->id,
        )->first();

        if (empty($instructor)) {
            return redirect()->route('faculty.dashboard');
        }

        $data['faculty'] = $instructor;

        return view('faculty.pages.profile.editprofile.editprofilelist', $data);
    }

    public function updateprofileindex(Request $request)
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
            $instructor = Instructor::find(
                auth()
                    ->guard('faculty')
                    ->user()->id
            );

            // dd($instructor);

            if (empty($instructor)) {
                return response()->json([
                    'status' => 2,
                ]);
            }

            $instructor->name = $request->name;
            $instructor->intal = $request->intal;
            $instructor->postion = $request->postion;
            $instructor->email = $request->email;
            $instructor->phone_ext = $request->phone_ext;
            $instructor->room_no = $request->room_no;
            $instructor->Mobile_number = $request->Mobile_number;
            $instructor->status = $request->status;
            $instructor->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'faculty-' . strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/facultys/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(150, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/facultys/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $instructor->img = $newFileName;
                $instructor->save();
            }


            $getfaculty = DB::table('faculties')->where('email',auth()->guard('faculty')->user()->email)->first();
            // dd($getfaculty);
            $faculty = Faculty::find($getfaculty->faculties_id);

            if (empty($faculty)) {
                return response()->json([
                    'status' => 1,
                ]);
            }

            $faculty->name = $request->name;
            $faculty->intal = $request->intal;
            $faculty->postion = $request->postion;
            $faculty->email = $request->email;
            $faculty->phone_ext = $request->phone_ext;
            $faculty->room_no = $request->room_no;
            $faculty->Mobile_number = $request->Mobile_number;
            $faculty->status = $request->status;
            $faculty->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'faculty-' . strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/facultys/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(150, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/facultys/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $faculty->img = $newFileName;
                $faculty->save();
            }

            // $request->session()->get('success', 'faculty Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'faculty Created Successfully.',
            ]);
        }
    }
}
