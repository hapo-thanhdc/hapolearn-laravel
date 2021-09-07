<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use App\Models\Tags;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $teachers = Course::TeacherOfCourse($id)->get();
        $lessons = Course::inforLessons($id)->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;
        $reviews = Course::find($id)->reviews;
        $userIds = [];
        if (!empty($reviews)) {
            foreach ($reviews as $review) {
                $userIds[] = $review->user_id;
            }
        }
        $userInfos = User::whereIn('id', $userIds)->select('avatar', 'name', 'id')->get();

        $userInfoMap = [];
        if (!empty($userInfos)) {
            foreach ($userInfos as $userInfo) {
                $userInfoMap[$userInfo->id] = $userInfo;
            }
        }

        return view('courses.course_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'teachers', 'isJoined', 'reviews', 'userInfoMap'));
    }

    public function join($id)
    {
        $course = Course::find($id);
        $course->users()->attach(Auth::id());

        return redirect()->route('courses.detail', [$id]);
    }

    public function addReview(Request $request)
    {
        return Review::create([
          'comment' => $request['content'],
          'rate' => $request['rate'],
          'course_id' => $request['course_id'],
          'date_times' => date("Y-m-d H:i:s"),
          'user_id' => Auth::id(),
          'lesson_id' => 0,
        ]);
    }
}
