<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CousineController extends Controller
{
    public function cousineDetail(Request $request,$id){
        
        $res = DB::table('foods')->where('id','=',$id)->get();   
        if($res == null) {
            abort('404');
        }
        $restaurant = DB::table('restaurants')->where('id','=',$res[0]->restaurant_id)->get();   

        return view('cuisine')->with([
            'foods' => $res,
            'r_name' => $restaurant[0]->name,
            'r_url' => $restaurant[0]->url
        ]);
    }
}
