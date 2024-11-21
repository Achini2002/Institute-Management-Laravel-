<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_has_subjects extends Model
{
    use HasFactory;
    protected $table = 'exam_has_subjects';
    protected $primarykey = 'id';
    protected $fillable = ['exam_id','subject_id'];



    public function subject(){
        return $this->belongsTo(Subject::class,'sub_id');
        }

        public function exam(){
            return $this->belongsTo(Exam::class,'exam_id');
            }
}

    
