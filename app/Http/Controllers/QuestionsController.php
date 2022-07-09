<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function create()
    {
          return Questions::create([
               'page_id' => request()->id,
               'question' => request()->question,
               'a' => request()->a,
               'b' => request()->b,
               'c' => request()->c,
               'd' => request()->d,
               'e' => request()->e,
               'f' => request()->f,
               'answer' => request()->answer
          ]);
    }
    public function get()
    {
          return  Questions::where('page_id',request()->page_id)->get();
    }
    public function delete()
    {
          return Questions::find(request()->id)->delete();
    }
}
