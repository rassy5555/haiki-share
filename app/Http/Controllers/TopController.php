<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//トップ画面表示処理クラス
class TopController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:convini');
        $this->middleware('guest:user');
    }

    public function top(){
        return view('top');
    }
}
