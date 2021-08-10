<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'name',
        'icon',
        'description',
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
        return $this->belongsToMany(Tag::class, 'course_id', 'tag_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }
}
