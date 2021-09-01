<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "course";

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

    public function scopeMainCourse($query)
    {
        $query->withCount(['users' => function ($subquery) {
            $subquery->where('role', config('constants.role.student'));
        }])->orderByDesc('users_count')->limit(config('constants.course.limit'));
    }

    public function scopeOtherCourse($query)
    {
        $query->orderByDesc('id')->limit(config('constants.course.limit'));
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
                $query->withCount(['users' => function ($subquery) {
                        $subquery->where('role', config('constants.role.student'));
                }])->orderBy('users_count');
            } else {
                $query->withCount([
                    'users' => function ($subquery) {
                        $subquery->where('role', config('constants.role.student'));
                    }])->orderByDesc('users_count');
            }
        }

        if (isset($data['times'])) {
            if ($data['times'] == config('constants.options.ascending')) {
                $query->addSelect(['times' => Lesson::selectRaw('sum(times) as total')
                    ->whereColumn('course_id', 'course.id')])
                    ->orderBy('times');
            } else {
                $query->addSelect(['times' => Lesson::selectRaw('sum(times) as total')
                    ->whereColumn('course_id', 'course.id')])
                    ->orderByDesc('times');
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
}
