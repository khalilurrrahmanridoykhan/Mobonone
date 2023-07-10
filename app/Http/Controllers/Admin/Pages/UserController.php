<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\CourseFacultyAssignment;
use App\Models\Faculty;
use App\Models\Temp_image_faculty;
use App\Models\Temp_image_user;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class UserController extends Controller
{
    //show all Faculty
    public function index(Request $request)
    {
        $user = User::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $user = $user->where('name', 'like', '%' . $request->keyword . '%');
        }

        $user = $user->paginate(15);

        $data['user'] = $user;

        return view('admin.pages.user.userlist', $data);
    }

    public function create()
    {
        return view('admin.pages.user.userinput');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'cgpa' => 'required',
            'credit' => 'required',
            'semester_no' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->get('errors', 'Student Created Failed.');
            session()->flash('danger', 'Task was Not successful!');

            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cgpa = $request->cgpa;
            $user->credit = $request->credit;
            $user->semester_no = $request->semester_no;
            $user->status = $request->status;
            $user->password = bcrypt('12345678');
            $user->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_user::where('temp_image_users_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'user-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/users/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(150, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/users/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $user->img = $newFileName;
                $user->save();
            }

            $request->session()->get('success', 'student Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'student Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {
        $user = User::where('id', $id)->first();

        if (empty($user)) {
            return redirect()->route('admin.user.index');
        }

        $data['user'] = $user;

        return view('admin.pages.user.useredit', $data);
    }
    public function update($id, Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'cgpa' => 'required',
            'credit' => 'required',
            'semester_no' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = User::find($id);

            if (empty($user)) {
                return response()->json([
                    'status' => 0,
                ]);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->cgpa = $request->cgpa;
            $user->credit = $request->credit;
            $user->semester_no = $request->semester_no;
            $user->status = $request->status;
            $user->password = bcrypt('12345678');
            $user->save();

            if ($request->image_id > 0) {
                $tempImage = Temp_image_user::where('temp_image_users_id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'user-' . strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/users/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(150, 150);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/users/thumb/large/' . $newFileName;
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
                'message' => 'faculty Created Successfully.',
            ]);

            echo '<script>
                ';
                echo "alert('hello');";
                echo '
            </script>';
        }
    }
    public function delete($id, Request $request)
    {
        $user = User::where('id', $id)->delete();
        // $faculty_course_dlt = CourseFacultyAssignment::where('faculty', $id)->delete();

        if (empty($user)) {
            return redirect()->route('admin.user.index');
        } else {
            return redirect()->route('admin.user.index');
        }
    }
}
