<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'result_id';
    protected $fillable = ['grade', 'mark_obtained',  'exam_exam_id'];

    
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_exam_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_has_result', 'result_result_id', 'subject_sub_id');
    }
}
