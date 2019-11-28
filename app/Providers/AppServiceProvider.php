<?php

namespace App\Providers;

use Validator;
use Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
use App\Convini;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('category_check', function($attribute, $value, $parameters, $validator) {
            $categories = Category::where('delete_flg',false)->get();
            foreach ($categories as $category){
                //入力されたカテゴリーがすでに登録されていないか確認
                if($value === $category->category_name){
                    \Debugbar::addMessage($category->category_name);
                    \Debugbar::addMessage($value);
                    return false;
                }
                return true;
            }
        });   
        Validator::extend('password_hash_check', function($attribute, $value, $parameters, $validator) {
            return Hash::check($value , $parameters[0]);
        });    
        Validator::extend('token_exist', function($attribute, $value, $parameters, $validator) {
            return Hash::check($value, $parameters[0]);
        });    
        Validator::extend('token_limit', function($attribute, $value, $parameters, $validator) {
            return (strtotime($parameters[0])+3600 > time());
        });    
    }
}
