<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'result_id';
    // protected $fillable = ['grade', 'mark_obtained', 'exam_exam_id']; //old fillable
    protected $fillable = ['exam_exam_id', 'stu_id', 'sub_id', 'mark_obtained', 'grade'];


    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_exam_id', 'exam_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'stu_id', 'stu_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sub_id', 'sub_id');
    }

}