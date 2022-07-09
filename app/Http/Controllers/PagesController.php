<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Topic;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function create()
    {
          return Pages::create([
               'topic_id' => request()->id,
               'title'  => request()->title,
               'type'      => request()->type,
               'content'      => request()->content,
          ]);
    }
    public function get()
    {
     return Topic::where('code', request()->code)->with('pages')->first();
    }
    public function getPages()
    {
          return Pages::where('topic_id', request()->topic_id)->get();
    }
    public function page()
    {
          return Pages::find(request()->id);
    }
    public function edit()
    {
          $data = Pages::find(request()->id);
          return $data->update([
               'title' => request()->title,
               'type' => request()->type,
               'content' => request()->content
          ]);
    }
    public function delete()
    {
          return Pages::find(request()->id)->delete();
    }
}
