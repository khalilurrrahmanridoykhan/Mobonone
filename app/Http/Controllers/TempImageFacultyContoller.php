<?php

namespace App\Http\Controllers;

use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;

class TempImageFacultyContoller extends Controller
{
    public function upload(Request $request){
        $temp = new Temp_image_faculty;
        $temp->name = "TEMP VALUE";
        $temp->save(); // This will create a blank entry in DB

        $image = $request->file('file');

        $destinationPath = './uploads/temp/';


        $extenstion = $image-> getClientOriginalExtension();
        $newFileName = $temp->temp_image_faculties_id.'.'.$extenstion;
        $image->move($destinationPath,$newFileName);

        $temp->name = $newFileName;
        $temp->save();

        return response()->json([
            'status' => 200,
            'id' => $temp->temp_image_faculties_id,
            'name' => $newFileName
        ]);

    }
}
