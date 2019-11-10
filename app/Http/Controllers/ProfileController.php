<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditRequest;


//ユーザー用プロフィール編集処理クラス
class ProfileController extends Controller
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

    //プロフィール編集バリデーション処理
    public function profileValidator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'email' => [ 'required','string', 'email:rfc,filter', 'max:30'],
            'user_pic' => ['file','image','mimes:png,jpeg,jpg,gif'],
        ]);
    }

    //パスワード変更バリデーション処理
    public function passwordValidator(array $data){
        $hashed_password = Auth::user()->password;
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8','max:50','different:old_password'],
            'password_confirm' =>['same:password'],
            'old_password' => ['required', 'string', 'min:8','max:50',"password_hash_check:$hashed_password"],
        ]);
    }

    //プロフィール編集画面へ遷移
    public function profileEditShow() {
        $user = Auth::user();
        return view('profileEdit',['user'=>$user]);   
    }

    //プロフィール編集
    public function profileEdit (Request $request) {
        //画像がPOST送信されていなければ画像を除いてバリデーション
        if(empty($request->user_pic)){
            $this->profileValidator($request->except(['user_pic']))->validate();
        } else {
            $this->profileValidator($request->all())->validate();
        }
        $user = Auth::user();
        $user->fill($request->except('user_pic'));
        //画像アップロード処理
        //画像がPOST通信されていればストレージに画像をアップロード
        if (!empty($request->user_pic)) {
            if($request->file('user_pic')->isValid()){
                $filePath = $request->file('user_pic')->store('public');
                $user->user_pic = str_replace('public/','',$filePath);
            } 
        }
      $user->save();
      return response()->json();
    }

    //パスワード変更
    public function changePassword(Request $request){
        $this->passwordValidator($request->all())->validate();
        //パスワードをハッシュ化
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
    }
}
