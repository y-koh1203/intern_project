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

    public function sortJapanese(){
        $foods = DB::table('foods')->where('genre','=','和')->get();

        return view('index')->with([
            'foods' => $foods
        ]);
    }

    public function sortWestern(){
        $foods = DB::table('foods')->where('genre','=','洋')->get();

        return view('index')->with([
            'foods' => $foods
        ]);
    }

    public function sortChinese(){
        $foods = DB::table('foods')->where('genre','=','中')->get();

        return view('index')->with([
            'foods' => $foods
        ]);
    }
}