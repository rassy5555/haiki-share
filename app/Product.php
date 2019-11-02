<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name','category_id', 'price', 'convini_id','user_id','expiration_date','comment','product_pic','saled_flg','delete_flg'
    ];

    public function convini()
    {
      return $this->belongsTo('App\Convini');
    }
    
}
