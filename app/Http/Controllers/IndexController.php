<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request,$id){
        return view('index')->with(
            [
                'name' => 'koki',
                'age' => 20,
                'id' => $id
            ]
        );
   }
}
