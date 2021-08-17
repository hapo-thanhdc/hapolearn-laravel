<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'user_id',
    ];
}
