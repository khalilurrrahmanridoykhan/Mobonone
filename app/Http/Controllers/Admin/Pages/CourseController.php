<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFacultyAssignment;
use App\Models\FacultySection;
use App\Models\FacultyTimeslot;
use App\Models\ParalalCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //show all course
    public function index(Request $request)
    {
        $course = Course::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $course = $course->where('courses_title', 'like', '%' . $request->keyword . '%');
        }

        $course = $course->paginate(15);

        $data['course'] = $course;

        return view('admin.pages.course.courselist', $data);
    }

    public function create()
    {

        $paralalcourse = ParalalCourse::orderBy('created_at', 'ASC')->get();

        $data['paralalcourse'] = $paralalcourse;

        return view('admin.pages.course.courseinput',$data);
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'courses_title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $course = new course();
            $course->courses_title = $request->courses_title;
            $course->courses_code = $request->courses_code;
            $course->credit = $request->credit;
            $course->course_type = $request->course_type;
            $course->paralal_courses = $request->paralal_courses;
            $course->status = $request->status;
            $course->save();

            $request->session()->get('success', 'course Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'course Created Successfully.',
            ]);
        }
    }


    // public function save(Request $request){
    //     echo "<pre>";
    //     print_r($request->all());
    // }

    public function edit($id, Request $request)
    {
        $course = course::where('courses_id', $id)->first();

        if (empty($course)) {
            return redirect()->route('admin.course.index');
        }

        $data['course'] = $course;

        // $coursechek = course::find($id);
        // $coursechek = DB::table('courses')->where('courses_id', $id)->find($id);


        // dd($id);
        // dd($course->courses_id);


        return view('admin.pages.course.courseedit', $data);
    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'courses_title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $course =  Course::find($id);

            if(empty($course)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $course->courses_title = $request->courses_title;
            $course->courses_code = $request->courses_code;
            $course->credit = $request->credit;
            $course->course_type = $request->course_type;
            $course->paralal_courses = $request->paralal_courses;
            $course->status = $request->status;
            $course->save();



        }
    }

// public function update($id, Request $request){
//     echo "<pre>";

//         print_r($request->all());
// }
    public function delete($id, Request $request)
    {



        $course = course::where('courses_id', $id)->delete();
        $faculty_course_dlt = CourseFacultyAssignment::where('course', $id)->delete();
        $sectionassiment = FacultySection::where('courses_code', $id)->delete();
        $timeslotassiment = FacultyTimeslot::where('courses_code', $id)->delete();

        if (empty($course) && empty($faculty_course_dlt)) {
            return redirect()->route('admin.course.index');
        } else {
            return redirect()->route('admin.course.index');
        }
    }
}
