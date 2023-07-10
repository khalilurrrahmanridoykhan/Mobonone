<?php

namespace App\Http\Controllers\User\Pages;

use App\Http\Controllers\Controller;
use App\Models\SemesterDrop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSemesterDropContoller extends Controller
{
    public function index(Request $request)
    {
        $semester = DB::table('uni_other_infos')
            ->where('status', 1)
            ->get();

        $status = DB::table('semester_drops')
        ->latest('updated_at')
        ->where('student_id', auth()->user()->id)
        ->first();

        $data['semester'] = $semester;
        $data['status'] = $status;

        return view('user.usersemesterdrop.semesterdrop', $data);
    }

    public function uplode(Request $request)
    {

        $request->validate(
            [
                'comment' => 'required',
                'file_path' => 'required',
            ]
            );
            $request->session()->get('errors', 'Fell Properly.');
            session()->flash('danger', 'Your Application For Semester Drop is Successfull. We will review and contact with you as soon as possible.');

            // echo "<pre>";
            // print_r(($request->all()));


            $filename = time() . 'semester-drop.' . $request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move(public_path('uploads/semesterdropfile'), $filename);

            // dd(auth()->user()->id);
            $semester = new SemesterDrop();
            $semester->student_id = auth()->user()->id;
            $semester->semester = $request->semester;
            $semester->comment = $request->comment;
            $semester->file_path = $filename;
            $semester->save();

            $request->session()->get('success', 'Semester Drop Apply Successfully.');
            session()->flash('success', 'Your Application For Semester Drop is Successfull. We will review and contact with you as soon as possible.');

            // return response()->json([
            //     'status' => 200,
            //     'message' => 'Semester Drop Apply Successfully.',
            // ]);

            $done = "its done";

            // $done['done'] = $done;

            return redirect()->route('user.semesterdrop');

        $validator = validator($request->all(), [
            'comment' => 'required',
        ]);

        // if ($validator->fails()) {
        //     $request->session()->get('errors', 'faculty Created Failed.');
        //     session()->flash('danger', 'Task was Not successful!');

        //     // return response()->json([
        //     //     'status' => 0,
        //     //     'errors' => $validator->errors(),
        //     // ]);
        //     // return back();

        // } else {
        // }
    }
}
