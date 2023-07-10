<?php

namespace App\Http\Controllers;

use App\Models\Temp_image_user;
use Illuminate\Http\Request;

class TempImageUserContoller extends Controller
{
    public function upload(Request $request){
        $temp = new Temp_image_user;
        $temp->name = "TEMP VALUE";
        $temp->save(); // This will create a blank entry in DB

        $image = $request->file('file');

        $destinationPath = './uploads/temp/';


        $extenstion = $image-> getClientOriginalExtension();
        $newFileName = $temp->temp_image_users_id.'.'.$extenstion;
        $image->move($destinationPath,$newFileName);

        $temp->name = $newFileName;
        $temp->save();

        return response()->json([
            'status' => 200,
            'id' => $temp->temp_image_users_id,
            'name' => $newFileName
        ]);

    }
}
