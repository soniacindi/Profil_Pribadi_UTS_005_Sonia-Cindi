<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Pengalamen;

class HomeController extends Controller
{
  public function index(Request $request){
    $biodatas = Biodata::all()->first();
    $pengalamens = Pengalamen::all();
    return view('index',['biodatas'=>$biodatas, 'pengalamens'=>$pengalamens]);
  }
}
