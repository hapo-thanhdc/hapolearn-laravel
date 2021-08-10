<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tag_id',
        'name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'tag_courses', 'course_id', 'tag_id');
    }
}
