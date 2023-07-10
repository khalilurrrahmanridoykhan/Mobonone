<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\UniOtherInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Temp_image_uniotherinfo;

class UniOtherInforContoller extends Controller
{

        //show all uniotherinfo
        public function index(Request $request)
        {
            $uniotherinfo = UniOtherInfo::orderBy('created_at', 'DESC');

            if (!empty($request->keyword)) {
                $uniotherinfo = $uniotherinfo->where('name', 'like', '%' . $request->keyword . '%');
            }

            $uniotherinfo = $uniotherinfo->paginate(15);

            $data['uniotherinfo'] = $uniotherinfo;

            return view('admin.pages.uniotherinfo.uniotherinfolist', $data);
        }

    public function create(){
        return view('admin.pages.uniotherinfo.uniotherinfoinput');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'year' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $uniotherinfo = new uniotherinfo();
            $uniotherinfo->semester = $request->semester;
            $uniotherinfo->year = $request->year;
            $uniotherinfo->status = $request->status;
            $uniotherinfo->save();


            $request->session()->get('success', 'uniotherinfo Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'uniotherinfo Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {

        $uniotherinfo = uniotherinfo::where('faculties_id', $id)->first();

        if(empty($uniotherinfo)){
            return redirect()->route('admin.uniotherinfo.index');
        }

        $data['uniotherinfo'] =  $uniotherinfo;

        return view('admin.pages.uniotherinfo.uniotherinfoedit', $data);


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
            $uniotherinfo =  uniotherinfo::find($id);

            if(empty($uniotherinfo)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $uniotherinfo->name = $request->name;
            $uniotherinfo->intal = $request->intal;
            $uniotherinfo->postion = $request->postion;
            $uniotherinfo->email = $request->email;
            $uniotherinfo->phone_ext = $request->phone_ext;
            $uniotherinfo->room_no = $request->room_no;
            $uniotherinfo->Mobile_number = $request->Mobile_number;
            $uniotherinfo->status = $request->status;
            $uniotherinfo->save();


        }
    }
    public function delete($id,Request $request)
    {
        $uniotherinfo = uniotherinfo::where('uni_other_infos_id', $id)->delete();

        if(empty($uniotherinfo)){
            return redirect()->route('admin.uniotherinfo.index');
        }else{
            return redirect()->route('admin.uniotherinfo.index');
        }
    }
}
