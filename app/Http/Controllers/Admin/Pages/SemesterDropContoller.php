<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Models\SemesterDrop;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class SemesterDropContoller extends Controller
{
    public function index(Request $request)
    {
        $semesterdrop = SemesterDrop::orderBy('created_at', 'DESC')->where('status',0);

        if (!empty($request->keyword)) {
            $semesterdrop = $semesterdrop->where('student_id', 'like', '%' . $request->keyword . '%');
        }

        $semesterdrop = $semesterdrop->paginate(15);

        $data['semesterdrop'] = $semesterdrop;

        return view('admin.pages.usersemesterdrop.usersemesterdroplist', $data);
    }


    public function approve($id,Request $request)
    {
        $semesterdrop =  SemesterDrop::find($id);

        if(empty($semesterdrop)){
            return response()->json([
                'status' => 0,
            ]);
        }

        $semesterdrop->status = 2;
        $semesterdrop->save();


        // dd(($id));

            return response()->json([
                'status' => 200,
            ]);
    }

    public function notapprove($id,Request $request)
    {
        $semesterdrop =  SemesterDrop::find($id);

        if(empty($semesterdrop)){
            return response()->json([
                'status' => 0,
            ]);
        }

        $semesterdrop->status = 3;
        $semesterdrop->save();

        // $semesterdropdelet = SemesterDrop::where('semester_drops_id', $id)->delete();

        // dd(($id));

            return response()->json([
                'status' => 200,
            ]);
    }
}
