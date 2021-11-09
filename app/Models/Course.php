<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'course';

    protected $fillable = [
        'name',
        'icon',
        'description',
        'lessons',
        'learners',
        'times',
        'quizzes',
        'price',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id', 'tag_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    public function getNumberReviewAttribute(){
        return $this->reviews()->count();
    }

    public function getNumberRateFiveAttribute(){
        return $this->reviews()->where('rate',5)->count();
    }

    public function getNumberRateFourAttribute(){
        return $this->reviews()->where('rate',4)->count();
    }

    public function getNumberRateThreeAttribute(){
        return $this->reviews()->where('rate',3)->count();
    }

    public function getNumberRateTwoAttribute(){
        return $this->reviews()->where('rate',2)->count();
    }

    public function getNumberRateOneAttribute(){
        return $this->reviews()->where('rate',1)->count();
    }
    
    public function getTotalRateAttribute(){
        return $this->reviews()->avg('rate');
    }

    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getCourseTimeAttribute()
    {
        return $this->lessons()->sum('times');
    }

    public function getNumberUserStudentAttribute()
    {
        return $this->users()->where('role', config('constants.role.student'))->count();
    }

    public function scopeTagsCourse($query, $id)
    {
        $query->leftJoin('course_tag', 'course.id', 'course_tag.course_id')
            ->leftJoin('tags', 'course_tag.tag_id', 'tags.id')
            ->where('course_tag.course_id', $id);
    }

    public function scopeTeacherOfCourse($query, $id)
    {
        $query->leftJoin('user_course', 'course.id', 'user_course.course_id')
            ->leftJoin('users', 'user_course.user_id', 'users.id')
            ->where('users.role', User::ROLE['teacher'])
            ->where('user_course.course_id', $id);
    }

    public function scopeInfoLessons($query, $id)
    {
        $query->join('lessons', 'course.id', '=', 'lessons.course_id')
            ->select('lessons.*')
            ->where('lessons.course_id', '=', $id);
    }


    public function scopeMainCourse($query)
    {
        $query->withCount(['users' => function ($subquery) {
            $subquery->where('role', config('constants.role.student'));
        }
        ])->orderByDesc('users_count')->limit(3);
    }

    public function scopeOtherCourse($query)
    {
        $query->orderByDesc('id')->limit(3);
    }

    public function scopeFilter($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('name', 'like', '%' . $data['keyword'] . '%')
                ->orWhere('description', 'like', '%' . $data['keyword'] . '%');
        }
        
        if (isset($data['newest_oldest'])) {
            if ($data['newest_oldest'] == config('constants.options.newest')) {
                $query->orderByDesc('id');
            } else {
                $query->orderBy('id');
            }
        }

        if (isset($data['teacher'])) {
            $query->whereHas('users', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['teacher']);
            });
        }

        if (isset($data['learner'])) {
            if ($data['learner'] == config('constants.options.ascending')) {
                $query->withCount([ 'users' => function ($subquery) {
                        $subquery->where('role', config('constants.role.student'));
                    }])->orderBy('users_count');
            } else  {
                $query->withCount([
                    'users' => function ($subquery) {
                        $subquery->where('role', config('constants.role.student'));
                    }
                ])->orderByDesc('users_count');
            }
        }

        if (isset($data['times'])) {
            if ($data['times'] == config('constants.options.ascending')) {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')])
                    ->orderBy('time');
            } else {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')])
                    ->orderByDesc('time');
            }
        }

        if (isset($data['lessons'])) {
            if ($data['lessons'] == config('constants.options.ascending')) {
                $query->withCount(['lessons'])->orderBy('lessons_count')->get();
            } else {
                $query->withCount(['lessons'])->orderByDesc('lessons_count')->get();
            }
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        if (isset($data['review'])) {
            if ($data['review'] == config('constants.options.ascending')) {
                $query->addSelect(['rate' => Review::selectRaw('avg(rate) as total')
                    ->whereColumn('course_id', 'course.id')])
                    ->orderBy('rate');
            } else {
                $query->addSelect(['rate' => Review::selectRaw('avg(rate) as total')
                    ->whereColumn('course_id', 'course.id')])
                    ->orderByDesc('rate');
            }
        }
    }

    public function scopeShowOtherCourses($query, $courseId)
    {
        $query->where('id', '<>', $courseId)->limit(5);
    }
}
