<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = ['page_id', 'question','a','b','c','d','e','f','answer'];
    public function page()
    {
        return $this->belongsTo(Pages::class);
    }
}
