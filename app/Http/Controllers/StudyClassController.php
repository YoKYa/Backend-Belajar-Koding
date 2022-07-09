<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProgrammingLanguage;

class StudyClassController extends Controller
{
     public function getLanguage()
     {
          return ProgrammingLanguage::get();
     }
     public function language()
     {
          return ProgrammingLanguage::where('slug', request()->slug)->first();
     }
     public function addStudyClass()
     {
          request()->validate([
               'name' => 'required',
          ]);
          return StudyClass::create([
               'programming_language_id' => request()->programming_language_id,
               'name' => request()->name,
               'slug'  => Str::slug(request()->name)
          ]);
     }
     public function getStudyClass()
     {
          if (request()->search) {
               return StudyClass::where('programming_language_id', request()->programming_language_id)->where('name', 'like','%'.request()->search.'%')->latest()->get();
          } else {
               return StudyClass::where('programming_language_id', request()->programming_language_id)->latest()->get();
          }    
     }
     public function getItemStudyClass(Request $request)
     {
          return StudyClass::find($request->kelas_id);
     }
     public function getSlugStudyClass()
     {
          return StudyClass::where('slug',request()->slug)->first();
     }
     public function addPicture(Request $request)
    {
          $picture = $request->file('picture')->store('materi/images/');
          $class = StudyClass::find($request->id);
          
          return $class->update([
               'picture' => $picture
         ]);
    }
    public function editDes(Request $request)
    {
          $class = StudyClass::find($request->kelas_id);
          return $class->update([
               'description' => $request->description
         ]);
    }
    public function delete()
    {
         return StudyClass::find(request()->kelas_id)->delete();
    }
}
