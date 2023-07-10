<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\CourseFacultyAssignment;
use App\Models\Faculty;
use App\Models\FacultySection;
use App\Models\FacultyTimeslot;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;


class FacultyController extends Controller
{

        //show all Faculty
        public function index(Request $request)
        {
            $faculty = Faculty::orderBy('created_at', 'DESC');

            if (!empty($request->keyword)) {
                $faculty = $faculty->where('name', 'like', '%' . $request->keyword . '%');
            }

            $faculty = $faculty->paginate(15);

            $data['faculty'] = $faculty;

            return view('admin.pages.faculty.facultylist', $data);
        }

    public function create(){
        return view('admin.pages.faculty.facultyinput');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            $request->session()->get('errors', 'faculty Created Failed.');
            session()->flash('danger', 'Task was Not successful!');

            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $faculty = new Faculty();
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

                $newFileName = 'faculty-' . $request->image_id . '.' . $ext;

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

            $request->session()->get('success', 'faculty Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'faculty Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {

        $faculty = Faculty::where('faculties_id', $id)->first();

        if(empty($faculty)){
            return redirect()->route('admin.faculty.index');
        }

        $data['faculty'] =  $faculty;

        return view('admin.pages.faculty.facultyedit', $data);


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
            $faculty =  Faculty::find($id);

            if(empty($faculty)){
                return response()->json([
                    'status' => 0,
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

                $newFileName = 'faculty-'.strtotime('now') . $request->image_id . '.' . $ext;

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

                // $request->session()->get('success', 'faculty Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'faculty Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $faculty = Faculty::where('faculties_id', $id)->delete();
        $faculty_course_dlt = CourseFacultyAssignment::where('faculty', $id)->delete();
        $sectionassiment = FacultySection::where('faculties_id', $id)->delete();
        $timeslotassiment = FacultyTimeslot::where('faculties_id', $id)->delete();

        if(empty($faculty) || empty($faculty_course_dlt) || empty($sectionassiment || $timeslotassiment)){
            return redirect()->route('admin.faculty.index');
        }else{
            return redirect()->route('admin.faculty.index');
        }


    }
}
