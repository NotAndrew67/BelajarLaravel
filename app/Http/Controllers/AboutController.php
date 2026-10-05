<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function about()
  {
      return view('admin.about', [
          'nama' => 'Muhammad Azzam Aulawy',
          'panggilan' => 'NotAndrew67',
          'github' => 'https://github.com/NotAndrew67'
      ]);
  }
}
