<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'comment',
        'rate',
        'date_times',
        'user_id',
        'course_id',
        'lesson_id'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_id', 'id')->where('lesson_id', null);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lessons::class, 'lesson_id', 'id')->where('course_id', null);
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'user_id', 'id');
    }
}
