<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'sub_id';
    protected $fillable = ['sub_name', 'credit_hours'];

    public function results()
    {
        return $this->belongsToMany(Result::class, 'subject_has_result', 'subject_sub_id', 'result_result_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_has_subject', 'subject_sub_id', 'course_course_id');
    }
}
