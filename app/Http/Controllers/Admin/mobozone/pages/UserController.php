<?php

namespace App\Http\Controllers\Admin\mobozone\pages;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Temp_image_faculty;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class UserController extends Controller
{
    //show all Faculty
    public function index(Request $request)
    {
        $editor = Instructor::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $editor = $editor->where('name', 'like', '%' . $request->keyword . '%');
        }

        $editor = $editor->paginate(15);

        $data['editor'] = $editor;

        return view('admin.mobozone.pages.user.userlist', $data);
    }

    public function edit($id, Request $request)
    {
        $editor = Instructor::where('id', $id)->first();

        if (empty($editor)) {
            return redirect()->route('admin.editor.index');
        }

        $data['editor'] = $editor;

        return view('admin.mobozone.pages.user.useredit', $data);
    }
    public function update($id, Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = Instructor::find($id);

            if (empty($user)) {
                return response()->json([
                    'status' => 0,
                ]);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status;
            // $user->password = bcrypt('12345678');
            $user->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_faculty::where('temp_image_faculties_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'user-' . strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/editor/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(150, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/editor/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $user->img = $newFileName;
                $user->save();

                // $request->session()->get('success', 'faculty Created Successfully.');
            }

            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'Editor edit Successfully.',
            ]);

            // echo '<script>
            //     ';
            //     echo "alert('hello');";
            //     echo '
            // </script>';
        }
    }
    public function delete($id, Request $request)
    {
        $editor = Instructor::where('id', $id)->delete();
        // $faculty_course_dlt = CourseFacultyAssignment::where('faculty', $id)->delete();

        if (empty($editor)) {
            return redirect()->route('admin.editor.index');
        } else {
            return redirect()->route('admin.editor.index');
        }
    }
}
