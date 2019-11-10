<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//ユーザー用パスワードリマインダー時のメール送信処理クラス
class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
        $this->middleware('guest:convini');
    }
}
