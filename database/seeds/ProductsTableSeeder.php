<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'product_name' => 'おにぎり',
            'convini_id' => 2,
            'price' => 100,
            'category_id' => 1,
            'expiration_date' => '2019-11-04 13:51:00',
            'comment' => '美味しい美味しいおにぎり',
            'product_pic' => 'no-image.png',
            'saled_flg' => 0,
            'delete_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
