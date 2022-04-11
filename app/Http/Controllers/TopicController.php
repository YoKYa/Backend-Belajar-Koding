<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function create(){
         return Topic::create([
               'sub_class_id' => request()->partId,
               'name' => request()->name,
               'code' => Str::random(24)
         ]);
    }
    public function get()
    {
         
    }
}
