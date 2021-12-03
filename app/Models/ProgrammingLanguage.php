<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'picture', 'description', 'slug'];

    public function Classes()
    {
        return $this->hasMany(StudyClass::class);
    }
}
