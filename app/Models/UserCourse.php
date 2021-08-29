<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Pivot
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "user_course";

    protected $fillable = [
        'course_id',
        'user_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_id');
    }

    public function getNumberUserStudentAttribute()
    {
        return $this->users()->get();
    }
}
