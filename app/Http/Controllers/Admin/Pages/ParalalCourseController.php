<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\ParalalCourse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class ParalalCourseController extends Controller
{


        //show all paralalcourse
        public function index(Request $request)
        {
            $paralalcourse = ParalalCourse::orderBy('created_at', 'DESC');

            if (!empty($request->keyword)) {
                $paralalcourse = $paralalcourse->where('name', 'like', '%' . $request->keyword . '%');
            }

            $paralalcourse = $paralalcourse->paginate(15);

            $data['paralalcourse'] = $paralalcourse;

            return view('admin.pages.paralalcourse.paralcourselist', $data);
        }

    public function create(){
        return view('admin.pages.paralalcourse.paralcourseinput');
    }

    public function save(Request $request)
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
            $paralalcourse = new paralalcourse();
            $paralalcourse->name = $request->name;
            $paralalcourse->Course_code = $request->Course_code;
            $paralalcourse->status = $request->status;
            $paralalcourse->save();


            $request->session()->get('success', 'paralalcourse Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'paralalcourse Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {

        $paralalcourse = paralalcourse::where('paralal_courses_id', $id)->first();

        if(empty($paralalcourse)){
            return redirect()->route('admin.paralalcourse.index');
        }

        $data['paralalcourse'] =  $paralalcourse;



        return view('admin.pages.paralalcourse.paralcourseedit', $data);


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
            $paralalcourse =  paralalcourse::find($id);

            if(empty($paralalcourse)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $paralalcourse->name = $request->name;
            $paralalcourse->Course_code = $request->Course_code;
            $paralalcourse->status = $request->status;
            $paralalcourse->save();



        }
    }
    public function delete($id,Request $request)
    {
        $paralalcourse = paralalcourse::where('paralal_courses_id', $id)->delete();

        if(empty($paralalcourse)){
            return redirect()->route('admin.paralacourse.index');
        }else{
            return redirect()->route('admin.paralacourse.index');
        }
    }
}
