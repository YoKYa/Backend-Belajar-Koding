<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubClass extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'study_class_id'];
    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class);
    }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
