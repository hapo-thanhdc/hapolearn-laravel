<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tags;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tags::all();

        return view('layouts.all_course', compact('courses', 'teachers','tags'));
    }

    public function courseSearch(Request $request)
    {
        $data = $request->all();
        if (isset($data['key'])) {
            $keyword = $data['key'];
        } else {
            $keyword = '';
        }
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tags::all();
        $courses = Course::filter($data)->paginate(config('constants.pagination'));
        return view('layouts.all_course', compact('courses','teachers', 'tags','keyword'));
    }
}
