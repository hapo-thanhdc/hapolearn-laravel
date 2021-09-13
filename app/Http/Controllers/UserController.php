<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tags;
use App\Models\UserCourse;
use App\Models\Lesson;
use App\Models\Document;
use App\Models\DocumentUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::students()->find(Auth::user()->id);
        $courses = User::courseAttended()->get();
        //dd($courses);
        return view('users.profile', compact('users', 'courses'));
    }

    public function update(Request $request)
    {
        $data = User::find($request->fid);

        if ($request->favauser) {
            $image = $request->favauser;
            $fileName = $image->getClientOriginalName();
            $data['avatar'] = url('storage/'.$fileName);

            Storage::disk('local')->put($fileName, file_get_contents($image->getRealPath()));
        }

        if ($request->fname) {
            $data->name = $request->fname;
        }

        if ($request->femail) {
            $data->email = $request->femail;
        }

        if ($request->fphone) {
            $data->phone = $request->fphone;
        }

        if ($request->faddress) {
            $data->address = $request->faddress;
        }

        if ($request->fabout) {
            $data->about_me = $request->fabout;
        }

        $data->save();

        return redirect('/profile');
    }
}
