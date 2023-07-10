<?php

namespace App\Http\Controllers\User\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCourseOfferedContoller extends Controller
{
    public function index(Request $request)
    {

        // $usder =  $request->user()->id;

        // dd($usder);

        // $assignment = ModelsCourseFacultyAssignment::orderBy('created_at', 'DESC');

        $offercourses = DB::table('course_faculty_assignments')
            ->select('courses.courses_code', 'faculties.intal','courses.paralal_courses', 'sections.Section_no', 'time_slots.time', 'time_slots.day', 'time_slots.room_no_for_class', 'course_faculty_assignments.status', 'course_faculty_assignments.course_faculty_assignments_id','course_faculty_assignments.created_at')
            ->leftJoin('courses', 'courses_id', 'course_faculty_assignments.course')
            ->leftJoin('faculties', 'faculties_id', 'course_faculty_assignments.faculty')
            ->leftJoin('sections', 'sections_id', 'course_faculty_assignments.Section')
            ->leftJoin('time_slots', 'time_slots_id', 'course_faculty_assignments.time')
            ->orderBy('created_at','DESC')
            ->get();

        // dd($assignment);

        if (!empty($request->keyword)) {
            $offercourses = $offercourses->where('name', 'like', '%' . $request->keyword . '%');
        }

        // $assignment = $assignment->paginate(15);

        $data['offercourses'] = $offercourses;

        return view('user.offercourse.offercourselist', $data);
    }
}
