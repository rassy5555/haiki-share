<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreatePost;
use App\Category;
use App\Product;
use App\User;
use App\Convini;
use App\Http\Requests\EditRequest;
use App\Mail\SendMail;

use Illuminate\Support\Facades\Mail;


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
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //商品登録バリデーション処理
    public function productValidator(array $data){
        return Validator::make($data, [
            'product_name' => ['required', 'string', 'max:30'],
            'category_id' => ['required'],
            'price' => ['required','integer'],
            'expiration_date' => ['required','date_format:"Y-m-d H:i"'],
            'comment' => ['string','max:200'],
            'product_pic' => ['file','image','mimes:png,jpeg,jpg,gif'],
        ]);
    }

    //商品詳細画面へ遷移
    public function productDetailShow($product_id) {
        $product = Product::where('id',$product_id)->first();
        //パラメータから検索し、該当の商品が登録されていない場合マイページに遷移
        if(empty($product)){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $categories = Category::all();
        $user = Auth::user();
        return view('productDetail',['categories'=>$categories,'product'=>$product,'user'=>$user]);
    }

    //商品購入(購入キャンセル)処理
    public function productPurchase($product_id, Request $request){
        $product = Product::where('id',$product_id)->first();
        if(empty($product)){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $product->saled_flg = $request->saled_flg;
        if($product->saled_flg){
            $product->user_id  = $request->user_id;
            $user = User::find($request->user_id);
            $convini = Convini::find($request->convini_id);
            \Debugbar::addMessage($convini);
            Mail::to([$user->email])->send(new SendMail($request->all()));
            Mail::to([$convini->email])->send(new SendMail($request->all()));

        } else {
            $product->user_id = null;   
        }
        $product->save();
    }

    //商品一覧画面へ遷移
    public function productListShow(){
        $categories = Category::all();
        $product_list = Product::where('delete_flg',false)->join('convinis','products.convini_id','=','convinis.id')->select('convinis.*','products.*')->get();
        return view('productList',['categories'=>$categories,'product_list'=>$product_list]);
    }
}