<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\CourseFacultyAssignment;
use App\Models\FacultySection;
use App\Models\FacultyTimeslot;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionCOntoller extends Controller
{

        //show all section
        public function index(Request $request)
        {
            $section = Section::orderBy('created_at', 'ASC');

            if (!empty($request->keyword)) {
                $section = $section->where('name', 'like', '%' . $request->keyword . '%');
            }

            $section = $section->paginate(15);

            $data['section'] = $section;

            return view('admin.pages.section.sectionlist', $data);
        }

    public function create(){
        return view('admin.pages.section.sectioninput');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'Section_no' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $section = new Section();
            $section->Section_no = $request->Section_no;
            $section->status = $request->status;
            $section->save();


            $request->session()->get('success', 'section Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'section Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {

        $section = Section::where('sections_id', $id)->first();

        if(empty($section)){
            return redirect()->route('admin.section.index');
        }

        $data['section'] =  $section;

        return view('admin.pages.section.sectionedit', $data);


    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'Section_no' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $section =  Section::find($id);

            if(empty($section)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $section->Section_no = $request->Section_no;
            $section->status = $request->status;
            $section->save();


        }
    }
    public function delete($id,Request $request)
    {
        $section = Section::where('sections_id', $id)->delete();
        $faculty_course_dlt = CourseFacultyAssignment::where('Section_no', $id)->delete();
        $sectionassiment = FacultySection::where('Section_no', $id)->delete();
        $timeslotassiment = FacultyTimeslot::where('Section_no', $id)->delete();
        if(empty($section ||$faculty_course_dlt || $sectionassiment || $timeslotassiment)){
            return redirect()->route('admin.section.index');
        }else{
            return redirect()->route('admin.section.index');
        }
    }
}
