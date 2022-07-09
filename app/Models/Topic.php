<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sub_class_id', 'description', 'code'];
    public function subClass()
    {
        return $this->belongsTo(SubClass::class);
    }
    public function pages()
    {
        return $this->hasMany(Pages::class);
    }
}
