<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'stu_id';
    protected $fillable = ['first_name', 'last_name', 'dob', 'gender', 'contact_number', 'email', 'address'];

    public function results()
    {
        return $this->hasMany(Result::class, 'student_stu_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_has_student', 'student_stu_id', 'course_course_id');
    }
}
