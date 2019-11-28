<?php

namespace App\Http\Controllers\User;
// namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//ユーザー用マイページ画面処理クラス
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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //マイページを表示
    public function index()
    {
        $user = Auth::user();
        $purchased_list = Product::where('user_id',$user->id)->where('delete_flg',false)->orderBy('updated_at', 'desc')->get();
        //GETパラメータがあればセッションメッセージを表示
        if(!empty($_GET['flash_message'])){
            switch($_GET['flash_message']){
                case 'purchase': 
                    session()->now('flash_message', '商品を購入しました');
                    break;
                case 'cancel': 
                    session()->now('flash_message', '購入をキャンセルしました');
                    break;
            }
        }
        return view('home',['user_id'=>$user->id,'purchased_list'=>$purchased_list]);
    }
}
