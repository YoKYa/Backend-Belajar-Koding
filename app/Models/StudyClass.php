<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'picture', 'programming_language_id', 'description', 'slug'];

    public function language()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }
    public function subClass()
    {
        return $this->hasMany(SubClass::class);
    }
}
