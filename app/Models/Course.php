<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
 
    public $timestamps = false;


    protected $primaryKey = 'course_id';
    protected $fillable = ['course_name', 'duration'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_has_student', 'course_course_id', 'student_stu_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_has_subject', 'course_course_id', 'subject_sub_id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'course_has_branch', 'course_id', 'branch_id');
    }
}
