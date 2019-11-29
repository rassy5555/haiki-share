<?php

namespace App\Http\Controllers\Convini;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//コンビニ用ログイン関係処理クラス
class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/convini/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:convini')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    //バリデーション処理
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email:rfc,filter|max:30',
            'password' => 'required|string|min:8|max:50',
        ]);
    }
    
    //ログイン画面を表示
    public function showLoginForm()
    {
        return view('convini.login');  
    }
 
    protected function guard()
    {
        return Auth::guard('convini');  
    }
    
    //ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('convini')->logout();  
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/convini/login'); 
    }
}
