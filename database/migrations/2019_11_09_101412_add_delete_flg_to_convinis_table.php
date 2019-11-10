<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeleteFlgToConvinisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('convinis', function (Blueprint $table) {
            //
            $table->boolean('delete_flg')->nullable()->after('convini_pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('convinis', function (Blueprint $table) {
            //
            $table->dropColumn('delete_flg');
        });
    }
}
