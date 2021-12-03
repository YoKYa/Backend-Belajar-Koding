<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProgrammingLanguage;
use Illuminate\Support\Facades\Storage;

class ProgrammingLanguageController extends Controller
{
     public function index()
     {
          return ProgrammingLanguage::get();
     }
     public function create()
     {
          request()->validate([
               'name' => 'required',
          ]);
          $picture = request()->file('picture')->store('images/programming');
          return ProgrammingLanguage::create([
               'name' => request()->name,
               'slug' => Str::slug(request()->name),
               'picture' => $picture,
               'description' => request()->description
          ]);
     }
     public function delete()
     {
          $language = ProgrammingLanguage::find(request()->id);
          return $language->delete();
     }
     public function store()
     {
          request()->validate([
               'name' => 'required',
          ]);
          $language = ProgrammingLanguage::find(request()->id);
          $picture = $language->picture;

          if (request()->file('picture')) {
               if ($language->picture) {
                    Storage::delete($language->picture);
               }     
               $picture = request()->file('picture')->store('images/picture');
          }
          return $language->update([
               'name' => request()->name,
               'picture' => $picture,
               'description' => request()->description
          ]);
     }
}
