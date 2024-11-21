<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'branch_id';
    protected $fillable = ['branch_name', 'address', 'institute_inst_id'];

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_inst_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_has_branch', 'branch_id', 'course_id');
    }
}
