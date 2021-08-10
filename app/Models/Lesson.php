<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'requirement',
        'detail',
        'course_id',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function reviewss()
    {
        return $this->hasMany(Reviews::class, 'lesson_id');
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'user_lessons', 'user_id', 'lesson_id');
    }
}
