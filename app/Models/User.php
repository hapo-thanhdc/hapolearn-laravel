<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    const ROLE = [
        'student' => 0,
        'teacher' => 1,
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'username',
        'avatar',
        'phone',
        'date_of_birth',
        'address',
        'about_me',
        'background',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class,'user_course','user_id',"course_id");
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'users_lessons', 'lesson_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'user_id');
    }

    public function scopeTeacher($query)
    {
        return $query->where('role', User::ROLE['teacher']);
    }

    public function ducuments()
    {
        return $this->belongsToMany(Document::class, 'document_users', 'user_id', 'document_id');
    }

    public function scopeStudents($query)
    {
        $query->where('role', User::ROLE['student']);
    }

    public function scopeCourseAttended($query)
    {
        $query->join('user_course', 'users.id', 'user_course.user_id')
            ->join('course', 'user_course.course_id', 'course.id')
            ->where('users.id', '=', Auth::user()->id)
            ->limit(5)
            ->orderByDesc('course_id')
            ->get('course.*');
    }
}
