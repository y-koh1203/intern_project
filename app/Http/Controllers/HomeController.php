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
        $body = $request->input('body');
        $price = $request->input('price');

        // ここにトランザクション処理
        // 画像と詳細がどっちもinsert成功した時のみcommit

        // DB::beginTransaction();
        // try {
        //     $blog = Blog::find($id);
        //     $blog->comments()->detach();
        //     $blog->delete();
        
        //     DB::commit();
        //     $success = true;
        // } catch (\Exception $e) {
        //     $success = false;
        //     DB::rollback();
        // }

        //リクエスト中にファイルが存在していない場合のエラー
        if (!$request->hasFile('file')) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像が未選択です。']);
        }

        var_dump($name);
        var_dump($restaurant_id);
        var_dump($body);
        var_dump($price);

        // $id = DB::table('foods')->insertGetId([
        //     ['restaurant_id' => $restaurant_id, 'name' => $name, 'body' => $body, 'price' => $price, 'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )]
        // ]);

        //画像のupload
        foreach($request->file('file') as $file){
            if ($file->isValid([])) {
                $filename = $file->store('public/images');
    
                DB::table('images')->insert([
                    ['food_id' => 1, 'path' => $filename, 'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )]
                ]);
            }else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
            }
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

        DB::table('restaurants')->insert([
            ['name' => $name, 'address' => $address, 'body' => $body, 'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )]
        ]);
        return redirect('/regist/restaurant')->with('success', '保存しました。');
    }
}
