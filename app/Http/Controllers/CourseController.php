<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        if (isset($data['keyword'])) {
            $keyword = $data['keyword'];
        } else {
            $keyword = '';
        }
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        $courses = Course::filter($data)->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'teachers', 'tags', 'keyword'));
    }
}
