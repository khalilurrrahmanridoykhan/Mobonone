<?php

namespace App\Http\Controllers\faculty\pages;

use App\Http\Controllers\Controller;
use App\Models\UserAdvising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index(Request $request){

        $getfaculty = DB::table('faculties')->where('email',auth()->guard('faculty')->user()->email)->first();

        $getcourse = DB::table('course_faculty_assignments')->where('faculty',$getfaculty->faculties_id)
        ->select('courses.courses_code','course_faculty_assignments.course', 'faculties.intal','faculties.faculties_id', 'sections.Section_no', 'time_slots.time', 'time_slots.day', 'time_slots.room_no_for_class', 'course_faculty_assignments.status', 'course_faculty_assignments.course_faculty_assignments_id','course_faculty_assignments.created_at')
        ->leftJoin('courses', 'courses_id', 'course_faculty_assignments.course')
        ->leftJoin('faculties', 'faculties_id', 'course_faculty_assignments.faculty')
        ->leftJoin('sections', 'sections_id', 'course_faculty_assignments.Section')
        ->leftJoin('time_slots', 'time_slots_id', 'course_faculty_assignments.time')
        ->orderBy('created_at','DESC')
        ->get();

        $gettotalstudent = UserAdvising::count('faculties_id', $getfaculty->faculties_id);

        // $gettotalstudentparcourse = DB::table('user_advisings')
        // ->where('faculties_id', $getcourse->faculties_id)
        // ->count();




        // $getstudent = DB::table('user_advisings')->where('faculties_id', $getfaculty->faculties_id)->get();

        // $getcoursedata = DB::table('user_advisings')->where('courses_no', $getfaculty->course)->get();
        // dd($getcourse);

        $data['getfaculty'] = $getfaculty;
        $data['getcourse'] = $getcourse;
        $data['gettotalstudent'] = $gettotalstudent;

        return view('faculty.pages.facultycourses.facultycourselist', $data);
    }

    public function getstudents($id,$course,Request $request){

        $getstudent = DB::table('user_advisings')->where('faculties_id', $id)
        ->select('user_advisings.*','users.name', 'courses.courses_code' )
        ->leftJoin('users', 'id', 'user_advisings.user_id')
        ->leftJoin('courses', 'courses_id', 'user_advisings.courses_no')
        ->where('courses_no', $course)
        ->get();

        $totalstudent = DB::table('user_advisings')->where('faculties_id', $id)
        ->select('user_advisings.*','users.name', 'courses.courses_code' )
        ->leftJoin('users', 'id', 'user_advisings.user_id')
        ->leftJoin('courses', 'courses_id', 'user_advisings.courses_no')
        ->where('courses_no', $course)
        ->count();

        // dd($totalstudent);
        $data['getstudent'] = $getstudent;
        $data['totalstudent'] = $totalstudent;

        return view('faculty.pages.viewstudes.viewstudents', $data);
    }
}
