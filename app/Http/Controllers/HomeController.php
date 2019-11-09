<?php

namespace App\Http\Controllers\User;
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function index()
    {
        $user = Auth::user();
        $purchased_list = Product::where('user_id',$user->id)->where('delete_flg',false)->orderBy('updated_at', 'desc')->take(5)->get();
        return view('home',['user_id'=>$user->id,'purchased_list'=>$purchased_list]);
    }
}
