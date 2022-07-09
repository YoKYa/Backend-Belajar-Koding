<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastSeens extends Model
{
    use HasFactory;
    protected $fillable = ['study_class_id', 'user_id', 'lastseen'];
    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class);
    }
}
