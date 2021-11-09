<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainCourses = Course::mainCourse()->get();
        $otherCourses = Course::otherCourse()->get();
        $reviews = Review::reviewUser()->get();
        $courseNumber = Course::all()->count();
        $lessonsNUmber = Lesson::all()->count();
        $learner = User::where('role', User::ROLE['student'])->count();

        return view('home', compact(['mainCourses', 'otherCourses', 'reviews','courseNumber','lessonsNUmber','learner']));
    }
}
