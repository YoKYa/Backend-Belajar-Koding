<?php

namespace App\Http\Controllers;

use App\Models\SubClass;
use Illuminate\Http\Request;

class SubClassController extends Controller
{
    public function create()
    {
         $studyClassId = request()->studyClassId;
         $nameSubClass = request()->name;

         return SubClass::create([
              'study_class_id'      => $studyClassId,
              'name'                  => $nameSubClass
         ]);
    }
    public function get()
    {
         return SubClass::where('study_class_id', '=', request()->studyClassId)->with('topics')->get();
    }
    public function delete()
    {
         return SubClass::find(request()->id)->delete();
    }
}
