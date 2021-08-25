<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsToMany(Course::class, 'user_courses', 'course_id', 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'users_lessons', 'lesson_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'user_id', 'id');
    }
}
