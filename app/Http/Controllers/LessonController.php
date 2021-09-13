<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentUser;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index($id)
    {
        $lessons = Lesson::find($id);
        $lessons->users()->attach(Auth::id());
        $course = Lesson::courseOfLesson($id)->first();
        $otherCourses = Course::limit(5)->get();
        $tags = Course::tagsCourse($course->id)->get();
        $teachers = Course::teacherOfCourse($course->id)->get();
        $numberStudent = Course::where('course.id', $course->id)->first();
        $documents = Lesson::documentsOfLesson($id)->get();
        $documentsLearned = Document::documentLearned($id)->get();
     
//        $percentage = round($documentsLearned->count() / $documents->count() * 100);
        $percentage =3/5*100;
        return view('lessons.index', compact('lessons', 'course', 'otherCourses', 'tags', 'numberStudent', 'teachers','documents','percentage'));
    }
    
    public function search(Request $request, $id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $teachers = Course::teacherOfCourse($id)->get();
        $lessons = Lesson::search($request->all())->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;

        if ($request->has('key_detail_course')) {
            $keyword = request()->get('key_detail_course');
        }

        return view('courses.course_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'teachers', 'keyword', 'isJoined'));
    }
}
