<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvinisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convinis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('convini_name');
            $table->string('branch_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('prefectures');
            $table->string('address');
            $table->rememberToken();
            $table->string('convini_pic')->nullable();
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
        Schema::dropIfExists('convinis');
    }
}
