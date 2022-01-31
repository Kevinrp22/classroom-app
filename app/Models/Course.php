<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'subject',
        'code',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, "teacher_id");
    }

    public function students()
    {
        return $this->belongsToMany(User::class, "course_student",  "course_id", "student_id",);
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
}
