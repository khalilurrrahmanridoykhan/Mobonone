<?php

namespace App\Http\Controllers\user\pages;

use App\Http\Controllers\Controller;
use App\Models\SingelUserCouses;
use App\Models\UserAdvising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use LengthException;

class UserAdvisingController extends Controller
{
    public function index(Request $request)
    {
        // $usder =  $request->user()->id;

        // dd($usder);

        // $assignment = ModelsCourseFacultyAssignment::orderBy('created_at', 'DESC');

        $offercourses = DB::table('course_faculty_assignments')
            ->select('courses.courses_code', 'faculties.intal', 'courses.paralal_courses', 'sections.Section_no', 'time_slots.time', 'time_slots.day', 'time_slots.room_no_for_class', 'course_faculty_assignments.status', 'course_faculty_assignments.course_faculty_assignments_id', 'course_faculty_assignments.created_at', 'course_faculty_assignments.faculty', 'course_faculty_assignments.course', 'courses.credit')
            ->leftJoin('courses', 'courses_id', 'course_faculty_assignments.course')
            ->leftJoin('faculties', 'faculties_id', 'course_faculty_assignments.faculty')
            ->leftJoin('sections', 'sections_id', 'course_faculty_assignments.Section')
            ->leftJoin('time_slots', 'time_slots_id', 'course_faculty_assignments.time')
            ->orderBy('created_at', 'DESC')
            ->get();

        // dd($assignment);
        $curentuser = DB::table('user_advisings')
            ->select('user_advisings.*', 'courses.courses_code')
            ->where('user_id', auth()->user()->id)
            ->leftJoin('courses', 'courses_id', 'user_advisings.courses_no')
            ->get();
        $curentuserSigledata = DB::table('singel_user_couses')
            ->where('user_id', auth()->user()->id)
            ->get();

        if (!empty($request->keyword)) {
            $offercourses = $offercourses->where('name', 'like', '%' . $request->keyword . '%');
        }

        // $assignment = $assignment->paginate(15);

        $data['offercourses'] = $offercourses;
        $data['curentuserSigledata'] = $curentuserSigledata;
        $data['curentuser'] = $curentuser;

        return view('user.advising.advisinglist', $data);
    }
    public function printslip(Request $request)
    {
        $curentuser = DB::table('user_advisings')
            ->select('user_advisings.*', 'courses.courses_code')
            ->where('user_id', auth()->user()->id)
            ->leftJoin('courses', 'courses_id', 'user_advisings.courses_no')
            ->get();
        $curentuserSigledata = DB::table('singel_user_couses')
            ->where('user_id', auth()->user()->id)
            ->get();

        $curentuserpersonaldata = DB::table('users')
            ->where('id', auth()->user()->id)
            ->get();
        $dt = new DateTime();
        $dt->format('Y-m-d H:i:s');

        $data['curentuser'] = $curentuser;
        $data['curentuserSigledata'] = $curentuserSigledata;
        $data['curentuserpersonaldata'] = $curentuserpersonaldata;
        $data['dt'] = $dt;
        $pdf = Pdf::loadView('user.printslip.printslip', $data);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'cursive']);
        return $pdf->stream();
    }

    public function saveandcheck(Request $request)
    {
        $offercourses = DB::table('course_faculty_assignments')
            ->select('courses.courses_code', 'faculties.intal', 'courses.paralal_courses', 'sections.Section_no', 'time_slots.time', 'time_slots.time_slots_id', 'time_slots.day', 'time_slots.room_no_for_class', 'course_faculty_assignments.status', 'course_faculty_assignments.course_faculty_assignments_id', 'course_faculty_assignments.created_at', 'course_faculty_assignments.faculty', 'course_faculty_assignments.course', 'courses.credit', 'course_faculty_assignments.semester')
            ->leftJoin('courses', 'courses_id', 'course_faculty_assignments.course')
            ->leftJoin('faculties', 'faculties_id', 'course_faculty_assignments.faculty')
            ->leftJoin('sections', 'sections_id', 'course_faculty_assignments.Section')
            ->leftJoin('time_slots', 'time_slots_id', 'course_faculty_assignments.time')
            ->orderBy('created_at', 'DESC')
            ->get();

        $curentusercheck = DB::table('user_advisings')
            ->where('user_id', auth()->user()->id)
            ->first();
        $curentuser = DB::table('user_advisings')
            ->where('user_id', auth()->user()->id)
            ->get();

        // dd($curentuser->all()!=null);

        $isFoundcourse = false;
        if ($curentuser->all() != null) {
            // foreach ($curentuser as $curentusers) {
            //     if ($course_id == $curentusers->courses_no) {
            //         $isFoundcourse = true;
            //     } else {
            //         $isFoundcourse = false;
            //     }

            // }

            $coursecheck = DB::table('user_advisings')
                ->where('user_id', auth()->user()->id)
                ->where('courses_no', $request->course)
                ->get();
            // dd($coursecheck->all()==null);

            $ifcourseisunice = false;
            if ($coursecheck->all() != null) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Already Take This course.',
                ]);
            } else {
                $ifcourseisunice = true;
            }
            if ($ifcourseisunice == true) {
                // $timeslot_day = 'Not';
                // $timeslot_time = 'Not';
                // foreach ($offercourses as $offercoursess) {
                //     if ($offercoursess->time == $request->time && $offercoursess->day == $request->day) {
                //         $timeslot_day = $offercoursess->time;
                //         $timeslot_time = $offercoursess->day;
                //     }
                // }
                // $isFoundtimeslot = false;
                // foreach ($curentuser as $curentusers) {
                //     if ($timeslot_day == $curentusers->time_no && $timeslot_time == $curentusers->day_no) {
                //         $isFoundtimeslot = true;
                //     } else {
                //         $isFoundtimeslot = false;
                //     }
                // }
                $timeslotcheck = DB::table('user_advisings')
                    ->where('user_id', auth()->user()->id)
                    ->where('time_no', $request->time)
                    ->where('day_no', $request->day)
                    ->get();
                // dd($isFoundtimeslot);
                $isTimeslotUnice = false;
                if ($timeslotcheck->all() != null) {
                    return response()->json([
                        'status' => 2,
                        'message' => 'Already Take This Time Slot.',
                    ]);
                } else {
                    $isTimeslotUnice = true;
                }

                if ($isTimeslotUnice == true) {
                    $ifgetterthen15cridit = DB::table('user_advisings')
                        ->where('user_id', auth()->user()->id)
                        ->get();

                    $totalcridit = 0;
                    foreach ($ifgetterthen15cridit as $ifgetterthen15cridits) {
                        if ($totalcridit < 16) {
                            $totalcridit = $totalcridit + $ifgetterthen15cridits->courses_cridit;
                        }
                    }
                    $totalcridit = $totalcridit + $request->credit;
                    // dd($totalcridit);
                    if ($totalcridit < 16) {
                        $useradvising = new UserAdvising();
                        $useradvising->courses_no = $request->courses_code;
                        $useradvising->user_id = auth()->user()->id;
                        $useradvising->Section_no = $request->Section_no;
                        $useradvising->faculties_id = $request->faculty;
                        // $useradvising->faculties_id = $request->faculty;
                        $useradvising->time_no = $request->time;
                        $useradvising->day_no = $request->day;
                        $useradvising->room_no_for_class_no = $request->room_no_for_class;
                        $useradvising->courses_no = $request->course;
                        $useradvising->courses_cridit = $request->credit;
                        // $useradvising->semester_no = $request->semester;
                        // $useradvising->year_no = $request->semester;
                        // $useradvising->status = $request->status;
                        $useradvising->save();

                        $userSingelCousesget = SingelUserCouses::where('user_id', auth()->user()->id)->first();
                        $userSingelCouses = SingelUserCouses::find($userSingelCousesget->singel_user_couses_id);
                        // dd($userSingelCouses->user_id);
                        if ($userSingelCousesget->course_no_1 != null && $userSingelCousesget->course_no_2 == null) {
                            $userSingelCouses->course_no_2 = $request->course;

                            $new_total_cridit = $userSingelCousesget->Total_cridit + $request->credit;
                            $userSingelCouses->Total_cridit = $new_total_cridit;
                            $userSingelCouses->save();
                        } elseif ($userSingelCousesget->course_no_2 != null && $userSingelCousesget->course_no_3 == null) {
                            $userSingelCouses->course_no_3 = $request->course;

                            $new_total_cridit = $userSingelCousesget->Total_cridit + $request->credit;
                            $userSingelCouses->Total_cridit = $new_total_cridit;
                            $userSingelCouses->save();
                        } elseif ($userSingelCousesget->course_no_3 != null && $userSingelCousesget->course_no_4 == null) {
                            $userSingelCouses->course_no_4 = $request->course;

                            $new_total_cridit = $userSingelCousesget->Total_cridit + $request->credit;
                            $userSingelCouses->Total_cridit = $new_total_cridit;
                            $userSingelCouses->save();
                        } elseif ($userSingelCousesget->course_no_4 != null && $userSingelCousesget->course_no_5 == null) {
                            $userSingelCouses->course_no_5 = $request->course;

                            $new_total_cridit = $userSingelCousesget->Total_cridit + $request->credit;
                            $userSingelCouses->Total_cridit = $new_total_cridit;
                            $userSingelCouses->save();
                        } else {
                        }

                        $request->session()->get('success', 'useradvising Created Successfully.');
                        session()->flash('success', 'Task was successful!');

                        return response()->json([
                            'status' => 200,
                            'data' => $totalcridit,
                            'message' => 'useradvising Created Successfully.',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 7,
                            'message' => 'You Cant take mare then 15 cridit.',
                        ]);
                    }
                }
                // echo 'I am here.';
                // dd($request);
            }
        } else {
            $useradvising = new UserAdvising();
            $useradvising->courses_no = $request->courses_code;
            $useradvising->user_id = auth()->user()->id;
            $useradvising->Section_no = $request->Section_no;
            $useradvising->faculties_id = $request->faculty;
            // $useradvising->faculties_id = $request->faculty;
            $useradvising->time_no = $request->time;
            $useradvising->day_no = $request->day;
            $useradvising->room_no_for_class_no = $request->room_no_for_class;
            $useradvising->courses_no = $request->course;
            $useradvising->courses_cridit = $request->credit;
            // $useradvising->semester_no = $request->semester;
            // $useradvising->year_no = $request->semester;
            // $useradvising->status = $request->status;
            $useradvising->save();

            // echo "First Input Done";

            $userSingelCouses = new SingelUserCouses();
            $userSingelCouses->user_id = auth()->user()->id;
            $userSingelCouses->course_no_1 = $request->course;
            $userSingelCouses->Total_cridit = $request->credit;
            $userSingelCouses->save();

            // echo "Second Input Done";

            $request->session()->get('success', 'useradvising Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'useradvising Created Successfully.',
            ]);
            // echo 'I am here.';
            // dd($request);
        }
    }

    public function delete($id, Request $request)
    {
        $curentuser = DB::table('user_advisings')
            ->select('user_advisings.*')
            ->where('user_id', auth()->user()->id)
            ->where('user_advisings_id', $id)
            ->first();

        $curentuserSigledata = DB::table('singel_user_couses')
            ->where('user_id', auth()->user()->id)
            ->first();
        // dd($curentuser);

        $curentuserSigledatafind = SingelUserCouses::find($curentuserSigledata->singel_user_couses_id);

        if ($curentuser->courses_no == $curentuserSigledata->course_no_1) {
            $curentuserSigledatafind->course_no_1 = null;
            $curentuserSigledatafind->Total_cridit =  $curentuserSigledatafind->Total_cridit-$curentuser->courses_cridit ;
            $curentuserSigledatafind->save();
        } elseif ($curentuser->courses_no == $curentuserSigledata->course_no_2) {
            $curentuserSigledatafind->course_no_2 = null;
            $curentuserSigledatafind->Total_cridit =  $curentuserSigledatafind->Total_cridit-$curentuser->courses_cridit ;
            $curentuserSigledatafind->save();
        } elseif ($curentuser->courses_no == $curentuserSigledata->course_no_3) {
            $curentuserSigledatafind->course_no_3 = null;
            $curentuserSigledatafind->Total_cridit =  $curentuserSigledatafind->Total_cridit-$curentuser->courses_cridit ;
            $curentuserSigledatafind->save();
        } elseif ($curentuser->courses_no == $curentuserSigledata->course_no_4) {
            $curentuserSigledatafind->course_no_4 = null;
            $curentuserSigledatafind->Total_cridit =  $curentuserSigledatafind->Total_cridit-$curentuser->courses_cridit ;
            $curentuserSigledatafind->save();
        } elseif ($curentuser->courses_no == $curentuserSigledata->course_no_5) {
            $curentuserSigledatafind->course_no_5 = null;
            $curentuserSigledatafind->Total_cridit =  $curentuserSigledatafind->Total_cridit-$curentuser->courses_cridit ;
            $curentuserSigledatafind->save();
        }

        if($curentuserSigledata->course_no_1 == null && $curentuserSigledata->course_no_2 == null && $curentuserSigledata->course_no_3 == null && $curentuserSigledata->course_no_4 == null && $curentuserSigledata->course_no_5 == null){
            $curentuserSigledata = SingelUserCouses::where('user_id', auth()->user()->id)->delete();
        }
        $curentuserSigledatadelete = DB::table('singel_user_couses')
        ->where('user_id', auth()->user()->id)
        ->first();
        // dd($curentuserSigledatadelete);
        if($curentuserSigledatadelete->Total_cridit == 0){
            $curentuserSigledata = SingelUserCouses::where('user_id', auth()->user()->id)->delete();

        }

        $curentuserdatadelete = UserAdvising::where('user_advisings_id', $id)->delete();

        // $sectionassiment = FacultySection::where('course_faculty_assignments_id_for_check', $id)->delete();
        // $timeslotassiment = FacultyTimeslot::where('course_faculty_assignments_id_for_check', $id)->delete();

        if ($curentuserdatadelete) {
            return redirect()->route('user.advising.index');
        } else {
            return redirect()->route('user.dashbord.index');
        }
    }
}
