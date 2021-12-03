<?php

namespace App\Http\Controllers;

use App\Models\Quotes;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
     public function getQuotes()
     {
          return Quotes::get(['id', 'title', 'quote']);
     }
     public function create()
     {
          $data = request()->validate([
               'title' => 'required|max:50',
               'quote' => 'required|max:100'
          ]);
          return Quotes::create($data);
     }
     public function store()
     {
          $quote = Quotes::find(request()->id);
          $data = request()->validate([
               'title' => 'required|max:50',
               'quote' => 'required|max:100'
          ]);
          return $quote->update($data);
     }
     public function delete()
     {
          $quote = Quotes::find(request()->id);
          return $quote->delete();
     }
}
