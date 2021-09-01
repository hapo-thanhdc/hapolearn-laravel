<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tags;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tags::all();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function courseSearch(Request $request)
    {
        $data = $request->all();
        if (isset($data['search_form_input'])) {
            $keyword = $data['search_form_input'];
        } else {
            $keyword = '';
        }
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tags::all();
        $courses = Course::filter($data)->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'teachers', 'tags', 'keyword'));
    }


    public function detail($id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $teachers = Course::TecherOfCourse($id)->get();
        $lessons = Course::inforLessons($id)->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;

        return view('courses.course_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'teachers', 'isJoined'));
    }

    public function join($id)
    {
        $course = Course::find($id);
        $course->users()->attach(Auth::id());

        return redirect()->route('courses.detail', [$id]);
    }
}
