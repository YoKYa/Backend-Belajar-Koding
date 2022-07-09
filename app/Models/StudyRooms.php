<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyRooms extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'study_class_id'];
    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class);
    }
}
