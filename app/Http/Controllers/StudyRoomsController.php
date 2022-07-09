<?php

namespace App\Http\Controllers;

use App\Models\StudyRooms;
use Illuminate\Http\Request;

class StudyRoomsController extends Controller
{
    public function addSR()
    {
          return StudyRooms::create([
               'user_id' => request()->user_id,
               'study_class_id' => request()->study_class_id
          ]);
    }
    public function delSR()
    {
          $data = StudyRooms::where('user_id',request()->user_id)->where('study_class_id',request()->study_class_id)->first();
          return $data->delete();
    }
    public function check()
    {
          return StudyRooms::where('user_id',request()->user_id)->where('study_class_id',request()->study_class_id)->get();
    }
    public function SR()
    {
      return StudyRooms::where('user_id',request()->user_id)->with('studyClass')->get();
    }
}
