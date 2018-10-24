<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.home');
    }

    // 料理の登録画面を表示
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

    // 料理の登録アクション
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

        // リクエスト中にファイルが存在していない場合のエラー
        if (!$request->hasFile('file')) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像が未選択です。']);
        }

        $fn_list = [];
        // 画像のupload
        foreach($request->file('file') as $file){
            if ($file->isValid([])) {
                $filename = $file->store('public/images/foods');
                $filename = explode('/',$filename);
                $fn_list[] = array_pop($filename);
            }else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
            }
        }

        $value_before = ['restaurant_id' => $restaurant_id, 'name' => $name, 'genre'=>$genre, 'body' => $body, 'price' => $price];
        for($i = 0;$i < count($fn_list);$i++){
            $index = $i+1;
            $value_fn['image_path'.$index] = $fn_list[$i];
        }
        $value_after = ['created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )];

        $tmp = array_merge($value_before,$value_fn);
        $value = array_merge($tmp,$value_after);

        DB::beginTransaction();
        try {
            DB::table('foods')->insert([
                $value
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

    // 飲食店の登録画面を表示
    public function insertRestaurant(){
        return view('admin.regist_restaurant');
    }

    // 飲食店の登録アクション
    public function registerRestaurant(Request $request){
        $name = $request->post('name');
        $address = $request->post('address');
        $body = $request->post('body');
        $url = $request->post('url');

        DB::beginTransaction();
        try {
            DB::table('restaurants')->insert([
                ['name' => $name, 'address' => $address, 'body' => $body, 'url' => $url, 'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time() )]
            ]);
        
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['restaurants' => '登録に失敗しました。']);
        }
     
        return redirect('/regist/restaurant')->with('success', '保存しました。');
    }

    // 料理の削除ページを表示
    public function deleteFoods(){
        $foods = DB::table('foods')->get();
        return view('admin.delete_foods')->with([
            'data' => $foods
        ]);
    }

    // 料理の削除を実行
    public function execDelete(Request $request){
        $del_foods_id = $request->post('foods');

        DB::beginTransaction();
        try {
            foreach($del_foods_id as $id){
                DB::table('foods')->where('id','=',$id)->delete();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['foods' => '削除に失敗しました。']);
        }

        return redirect('/delete/foods')->with('success', '削除しました。');
    }

     // 飲食店の削除ページを表示
     public function deleteRestaurants(){
        $restaurants = DB::table('restaurants')->get();
        return view('admin.delete_restaurant')->with([
            'data' => $restaurants
        ]);
    }

    // 飲食店の削除を実行
    public function execDeleteRestaurants(Request $request){
        $del_rest_id = $request->post('restaurants');

        DB::beginTransaction();
        try {

            foreach($del_rest_id as $id){
                DB::table('foods')->where('restaurant_id','=',$id)->delete();
                DB::table('restaurants')->where('id','=',$id)->delete();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['restaurants' => '削除に失敗しました。']);
        }

        return redirect('/delete/restaurants')->with('success', '削除しました。');
    }
}