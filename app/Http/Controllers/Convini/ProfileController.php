<?php

namespace App\Http\Controllers\Convini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditRequest;


//プロフィール編集処理クラス
class ProfileController extends Controller
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
            'email' => [ 'required','string', 'email:rfc,filter', 'max:30'],
            'convini_pic' => ['file','image','mimes:png,jpeg,jpg,gif'],
        ]);
    }

    //パスワード変更バリデーション処理
    public function passwordValidator(array $data){
        $hashed_password = Auth::user()->password;
        \Debugbar::addMessage($data);
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8','max:50','same:password_confirm','different:old_password'],
            'password_confirm' =>['same:password'],
            'old_password' => ['required', 'string', 'min:8','max:50',"password_hash_check:$hashed_password"],
        ]);
    }

    //プロフィール編集画面へ遷移
    public function profileEditShow() {
        $convini = Auth::user();
        return view('convini.profileEdit',['convini'=>$convini]);
    }

    //プロフィール編集
    public function profileEdit (Request $request) {
        //画像がPOST送信されていなければ画像を除いてバリデーション
        if(empty($request->convini_pic)){
            $this->profileValidator($request->except(['convini_pic']))->validate();
        } else {
            $this->profileValidator($request->all())->validate();
        }
        $convini = Auth::user();
        $convini->fill($request->except('convini_pic'));
        //画像アップロード処理
        //画像がPOST通信されていればストレージに画像をアップロード
        if (!empty($request->convini_pic)) {
            if($request->file('convini_pic')->isValid()){
                $filePath = $request->file('convini_pic')->store('public');
                $convini->convini_pic = str_replace('public/','',$filePath);
            } 
        }
      $convini->save();
      return response()->json();
    }

    //パスワード変更
    public function changePassword(Request $request){
        $this->passwordValidator($request->all())->validate();
        \Debugbar::addMessage($request->password);
        //パスワードをハッシュ化
        $convini = Auth::user();
        $convini->password = Hash::make($request->password);
        \Debugbar::addMessage($convini->password);
        $convini->save();
    }
}
