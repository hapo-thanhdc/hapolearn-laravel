<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'comment',
        'rate',
        'date_times',
        'user_id',
        'course_id',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_id', 'reviews_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lessons::class, 'lesson_id', 'reviews_id');
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'user_id', 'reviews_id');
    }
}
