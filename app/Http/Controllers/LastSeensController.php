<?php

namespace App\Http\Controllers;

use App\Models\LastSeens;
use Illuminate\Http\Request;

class LastSeensController extends Controller
{
    public function add()
    {
          // Find
          $find = LastSeens::where('study_class_id', request()->study_class_id)->where('user_id',request()->user_id)->get();
          if ($find->count() != 0) {
               return $find->first()->update([
                    'lastseen' => now()
               ]);
          }else{
               return LastSeens::create([
                    'study_class_id' => request()->study_class_id,
                    'user_id' => request()->user_id,
                    'lastseen' => now()
               ]);
          }
    }
    public function get()
    {
          return LastSeens::where('user_id', request()->user_id)->with('studyClass')->orderBy('lastseen', 'desc')->limit(4)->get();
    }
}
