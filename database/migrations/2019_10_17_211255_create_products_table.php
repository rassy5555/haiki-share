<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('convini_id');
            $table->integer('user_id')->nullable();
            $table->string('product_name');
            $table->integer('price');
            $table->integer('category_id');
            $table->dateTime('expiration_date');
            $table->string('comment')->nullable();
            $table->string('product_pic')->nullable();
            $table->boolean('saled_flg');
            $table->boolean('delete_flg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
