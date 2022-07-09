<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TopicController extends Controller
{
     public function create()
     {
          return Topic::create([
               'sub_class_id' => request()->partId,
               'name' => request()->name,
               'code' => Str::random(24)
          ]);
     }
     public function delTopic()
     {
          return Topic::where('code', request()->code)->first()->delete();
     }
     public function get()
     {
          return Topic::where('code', request()->code)->with('subClass')->first();
     }
}
