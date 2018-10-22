<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request){
        $foods = DB::table('foods')->get();

        return view('index')->with([
            'foods' => $foods
        ]);
   }
}
