<?php

namespace App\Http\Controllers;

use App\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertController extends Controller
{
    public function form(){
        return view('insert');
    }
}
