<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'exam_id';
    protected $fillable = ['exam_name', 'exam_date'];

    public function results()
    {
        return $this->hasMany(Result::class, 'exam_exam_id');
    }
}
