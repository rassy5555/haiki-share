<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//カテゴリーテーブル
class Category extends Model
{
    //
    protected $fillable = [
        'category_name','delete_flg'
    ];
}
