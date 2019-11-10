<?php

namespace App\Http\Controllers\Convini;

use App\Convini;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditRequest;

//マイページ画面処理クラス
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:convini');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $convini = Auth::user();
        //出品した商品を５件取得
        $listing_list = Product::where('convini_id',$convini->id)->where('delete_flg',false)->orderBy('updated_at', 'desc')->take(5)->get();
        //購入済商品を5件取得
        $saled_list = Product::where('convini_id',$convini->id)->where('saled_flg',true)->where('delete_flg',false)->orderBy('updated_at', 'desc')->take(5)->get();
        return view('convini.home',['convini_id'=>$convini->id,'listing_list'=>$listing_list,'saled_list'=>$saled_list]);
    }
}
