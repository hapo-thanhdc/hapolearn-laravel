<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'lesson_id', 'id')->where('course_id', null);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'user_id', 'lesson_id');
    }

    public function scopeCourseOfLesson($query, $id)
    {
        $query->leftJoin('course', 'lessons.course_id', 'course.id')
            ->where('lessons.id', $id)
            ->select('course.*');
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['key_detail_course'])) {
            $query->where('name', 'like', '%' . $data['key_detail_course'] . '%');
        }
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'course_id');
    }

    public function scopeDocumentsOfLesson($query, $id)
    {
        $query->leftJoin('documents', 'lessons.id', 'documents.lesson_id')
            ->where('documents.lesson_id', $id)
            ->select('documents.*');
    }
}
