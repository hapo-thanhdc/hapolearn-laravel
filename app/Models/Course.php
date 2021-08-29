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
        return $this->belongsToMany(Tags::class, 'course_tag', 'course_id', 'tag_id');
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
        return $this->users()->where('role', User::ROLE['student'])->count();
    }

    public function scopeFilter($query, $data)
    {
        if (isset($data['key'])) {
            $query->where('name', 'like', '%' . $data['key'] . '%')
                ->orWhere('description', 'like', '%' . $data['key'] . '%');
        }

        if (isset($data['sort'])) {
            if ($data['sort'] == config('constants.options.newest')) {
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
                $query->withCount([
                    'users' => function ($subquery) {
                        $subquery->where('role', User::ROLE['student']);
                    }
                ])->orderBy('users_count');
            } elseif ($data['learner'] == config('constants.options.decrease')) {
                $query->withCount([
                    'users' => function ($subquery) {
                        $subquery->where('role', User::ROLE['student']);
                    }
                ])->orderByDesc('users_count');
            }
        }

        if (isset($data['times'])) {
            if ($data['times'] == config('constants.options.ascending')) {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')])
                    ->orderBy('time');
            } elseif ($data['times'] == config('constants.options.decrease')) {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')])
                    ->orderByDesc('time');
            }
        }

        if (isset($data['lessons'])) {
            if ($data['lessons'] == config('constants.options.ascending')) {
                $query->withCount(['lessons'])->orderBy('lessons_count')->get();
            } elseif ($data['lessons'] == config('constants.options.decrease')) {
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
                    ->whereColumn('course_id', 'courses.id')])
                    ->orderBy('rate');
            } elseif ($data['review'] == config('constants.options.decrease')) {
                $query->addSelect(['rate' => Review::selectRaw('avg(rate) as total')
                    ->whereColumn('course_id', 'courses.id')])
                    ->orderByDesc('rate');
            }
        }
    }
}
