<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotContoller extends Controller
{
    //show all timeslot
    public function index(Request $request)
    {
        $timeslot = TimeSlot::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $timeslot = $timeslot->where('timeslots_title', 'like', '%' . $request->keyword . '%');
        }

        $timeslot = $timeslot->paginate(15);

        $data['timeslot'] = $timeslot;

        return view('admin.pages.timeslot.timeslotlist', $data);
    }

    public function create()
    {
        $timeslot = TimeSlot::get();


        $data['timeslot'] = $timeslot;
        // dd($timeslot);
        return view('admin.pages.timeslot.timeslotinput', $data);
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'room_no_for_class' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $timeslot = new timeslot();
            $timeslot->time = $request->time;
            $timeslot->day = $request->day;
            $timeslot->room_no_for_class = $request->room_no_for_class;
            $timeslot->checkifunice = $request->checkifunice;
            $timeslot->status = $request->status;
            $timeslot->save();

            $request->session()->get('success', 'timeslot Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'timeslot Created Successfully.',
            ]);
        }
    }


    // public function save(Request $request){
    //     echo "<pre>";
    //     print_r($request->all());
    // }

    public function edit($id, Request $request)
    {
        $timeslot = timeslot::where('time_slots_id', $id)->first();

        if (empty($timeslot)) {
            return redirect()->route('admin.timeslot.index');
        }

        $data['timeslot'] = $timeslot;

        // $timeslotchek = timeslot::find($id);
        // $timeslotchek = DB::table('timeslots')->where('timeslots_id', $id)->find($id);


        // dd($id);
        // dd($timeslot->timeslots_id);


        return view('admin.pages.timeslot.timeslotedit', $data);
    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'room_no_for_class' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $timeslot =  timeslot::find($id);

            if(empty($timeslot)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $timeslot->time = $request->time;
            $timeslot->day = $request->day;
            $timeslot->room_no_for_class = $request->room_no_for_class;
            $timeslot->status = $request->status;
            $timeslot->save();



        }
    }

// public function update($id, Request $request){
//     echo "<pre>";

//         print_r($request->all());
// }
    public function delete($id, Request $request)
    {
        $timeslot = timeslot::where('time_slots_id', $id)->delete();

        if (empty($timeslot)) {
            return redirect()->route('admin.timeslot.index');
        } else {
            return redirect()->route('admin.timeslot.index');
        }
    }

    public function gettimedlotdata(Request $request)
    {
        $gettimedlotdata = TimeSlot::get();

        // return Response::json($gettimeslot);
        return response()->json($gettimedlotdata, 200);
    }
}
