<?php

namespace App\Http\Controllers\Convini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditRequest;


//商品関係処理コントローラー
class ProductController extends Controller
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

    //プロフィール編集バリデーション処理
    public function profileValidator(array $data){
        return Validator::make($data, [
            'convini_name' => ['required', 'string', 'max:20'],
            'branch_name' => ['required', 'string', 'max:20'],
            'prefectures' => ['required'],
            'address' => ['required', 'string', 'max:50'],
            'email' => [ 'required','string', 'email:rfc,filter', 'max:50'],
            'convini_pic' => ['file','image','mimes:png,jpeg,jpg,gif'],
        ]);
    }

    //商品登録画面へ遷移
    public function productRegisterShow() {
        return view('convini.productRegister');
    }
}