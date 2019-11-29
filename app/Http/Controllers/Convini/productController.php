<?php

namespace App\Http\Controllers\Convini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Product;
use App\Convini;
use App\Http\Requests\EditRequest;


//商品関係処理クラス
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

    //カテゴリー登録バリデーション処理
    public function categoryValidator(array $data){
        return Validator::make($data, [
            'category_name' => ['required', 'string', 'max:15',"category_check"],
        ]);
    }

    //商品登録バリデーション処理
    public function productValidator(array $data){
        return Validator::make($data, [
            'product_name' => ['required', 'string', 'max:20'],
            'category_id' => ['required'],
            'price' => ['required','integer','digits_between:1,6'],
            'expiration_date' => ['required','date_format:"Y-m-d H:i"'],
            'comment' => ['required','string','max:200'],
            'product_pic' => ['file','image','mimes:png,jpeg,jpg,gif'],
        ]);
    }

    //カテゴリー登録画面へ遷移
    public function categoryRegisterShow() {
        $categories = Category::where('delete_flg',false)->get();
        return view('convini.categoryRegister',['categories'=>$categories]);
    }

    //カテゴリー登録処理
    public function categoryRegister(Request $request) {
        $this->categoryValidator($request->all())->validate();
        $category = new Category;
        $category->fill($request->all());
        $category->delete_flg = false;
        $category->save();
    }

    //商品登録画面へ遷移
    public function productRegisterShow() {
        $categories = Category::where('delete_flg',false)->get();
        return view('convini.productRegister',['categories'=>$categories]);
    }

    //商品登録処理
    public function productRegister (Request $request) {
        $this->productValidator($request->all())->validate();
        $product = new Product;
        $product->fill($request->all());
        $product->convini_id = Auth::user()->id;
        $product->saled_flg = false;
        $product->delete_flg = false;

        //画像アップロード処理
        if (!empty($request->product_pic)) {
            if($request->file('product_pic')->isValid()){
                $filePath = $request->file('product_pic')->store('public');
                $product->product_pic = str_replace('public/','',$filePath);
            } 
        }
        $product->save();
        return response()->json();
    }


    //商品編集画面へ遷移
    public function productEditShow($product_id) {
        $product = Product::where('delete_flg',false)->find($product_id);
        //パラメータから検索し、該当の商品が登録されていないまたは商品の出品者IDとログインユーザーのIDが違う場合マイページに遷移
        if(empty($product) || ($product->convini_id !== Auth::user()->id) ){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $categories = Category::where('delete_flg',false)->get();
        return view('convini.productEdit',['categories'=>$categories,'product'=>$product]);
    }

    //商品編集処理
    public function productEdit($product_id, Request $request) {
        $product = Product::where('delete_flg',false)->find($product_id);
        //パラメータから検索し、該当の商品が登録されていないまたは商品の出品者IDとログインユーザーのIDが違う場合マイページに遷移        
        if(empty($product) || ($product->convini_id !== Auth::user()->id) ){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        // //画像がPOST送信されていなければ画像を除いてバリデーション
        if(empty($request->product_pic)){
            $this->productValidator($request->except(['product_pic']))->validate();
        } else {
            $this->productValidator($request->all())->validate();
        }
        $product->fill($request->except('product_pic'));

        //画像アップロード処理
        if (!empty($request->product_pic)) {
            if($request->file('product_pic')->isValid()){
                $filePath = $request->file('product_pic')->store('public');
                $product->product_pic = str_replace('public/','',$filePath);
            } 
        }
        $product->save();
    }

    //商品削除編集処理
    public function productDelete ($product_id, Request $request) {
        $product = Product::where('delete_flg',false)->find($product_id);
        //パラメータから検索し、該当の商品が登録されていないまたは商品の出品者IDとログインユーザーのIDが違う場合マイページに遷移        
        if(empty($product) || ($product->convini_id !== Auth::user()->id) ){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $product->delete_flg = true;
        $product->save();
    }

    //商品詳細画面へ遷移
    public function productDetailShow($product_id) {
        $product = Product::where('delete_flg',false)->find($product_id);
        //パラメータから検索し、該当の商品が登録されていない場合マイページに遷移
        if(empty($product)){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $categories = Category::where('delete_flg',false)->get();
        $convini = Auth::user();
        return view('convini.productDetail',['categories'=>$categories,'product'=>$product,'convini'=>$convini]);
    }


    //商品一覧画面へ遷移
    public function productListShow(){
        $categories = Category::where('delete_flg',false)->get();
        //商品テーブルとコンビニテーブルを結合させて商品一覧を取得
        $product_list = Product::join('convinis','products.convini_id','=','convinis.id')
        ->select('products.*','convinis.convini_name','convinis.branch_name','convinis.email','convinis.prefectures','convinis.address','convinis.delete_flg')
        ->where('convinis.delete_flg',false)->where('products.delete_flg',false)
        ->orderBy('products.updated_at', 'desc')->get();
        return view('convini.productList',['categories'=>$categories,'product_list'=>$product_list]);
    }
    

    //出品リストへ遷移
    public function listingListShow ($convini_id) {
        $convini = Convini::where('delete_flg',false)->find($convini_id);
        //パラメータから検索し、該当するコンビニが存在しないまたは、コンビニのIDとログインIDが違う場合マイページへ遷移
        if(empty($convini) || ($convini->id !== Auth::user()->id) ){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $listing_list = Product::where('convini_id',$convini_id)->where('delete_flg',false)->orderBy('updated_at', 'desc')->get();
        return view('convini.listingList',['listing_list'=>$listing_list]);
    }

    //購入済リストへ遷移
    public function saledListShow ($convini_id) {
        $convini = Convini::where('delete_flg',false)->find($convini_id);
        if(empty($convini) || ($convini->id !== Auth::user()->id) ){
            return redirect()->action('Convini\HomeController@index')->with('flash_message', '不正な値が入力されました');
        }
        $saled_list = Product::where('convini_id',$convini_id)->where('saled_flg',true)->where('delete_flg',false)->orderBy('updated_at', 'desc')->get();
        return view('convini.saledList',['saled_list'=>$saled_list]);
    }
}