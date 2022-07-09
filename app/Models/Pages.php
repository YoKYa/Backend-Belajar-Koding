<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = ['topic_id', 'type', 'content','title'];
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
