<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    //料理の登録画面を表示
    public function insertFoods(){
        $restaurants = DB::table('restaurants');
        $data = $restaurants->get();

        $property_of_lists = '';
        foreach($data as $datum){
            $property_of_lists.= $datum->id.' => '.$datum->name.',';
        }

        $property_of_lists = rtrim($property_of_lists);
        
        return view('admin.regist_foods')->with(
            ['data' => $data,'d' => $property_of_lists]
        );
    }

    //飲食店の登録アクション
    public function registerFoods(Request $request){        
        $name = $request->input('name');
        $restaurant_id = $request->input('restaurant_id');
        $genre = $request->input('genre');
        $body = $request->input('body');
        $price = $request->input('price');

        switch($genre){
            case 1:
                $genre = '和';
                break;
            case 2:
                $genre = '洋';
                break;
            case 3:
                $genre = '中';
                break;
            default: 
                break;
        }

        //リクエスト中にファイルが存在していない場合のエラー
        if (!$request->hasFile('file')) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像が未選択です。']);
        }

        $fn_list = [];
        //画像のupload
        foreach($request->file('file') as $file){
            if ($file->isValid([])) {
                $filename = $file->store('public/images');
                $filename = explode('/',$filename);
                $fn_list[] = array_pop($filename);
            }else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
            }
        }

        DB::beginTransaction();
        try {
            DB::table('foods')->insert([
                ['restaurant_id' => $restaurant_id, 'name' => $name, 'genre'=>$genre, 'body' => $body, 'price' => $price,
                'image_path1' => $fn_list[0], 'image_path2' => $fn_list[1], 'image_path3' => $fn_list[2], 
                'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )]
            ]);
        
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['file' => '登録に失敗しました。']);
        }

        return redirect('/regist/foods')->with('success', '保存しました。');
    }

    //飲食店の登録画面を表示
    public function insertRestaurant(){
        return view('admin.regist_restaurant');
    }

    public function registerRestaurant(Request $request){
        $name = $request->post('name');
        $address = $request->post('address');
        $body = $request->post('body');
        $url = $request->post('url');

        DB::table('restaurants')->insert([
            ['name' => $name, 'address' => $address, 'body' => $body, 'url' => $url, 'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )]
        ]);
        return redirect('/regist/restaurant')->with('success', '保存しました。');
    }
}
