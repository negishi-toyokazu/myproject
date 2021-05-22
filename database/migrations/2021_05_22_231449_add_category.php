<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            DB::table('users')->insert(
                array(
                    ['category' => 'きゅうり',
                    'class' => '野菜'],
                    ['category' => 'なす',
                    'class' => '野菜'],
                    ['category' => 'みかん',
                    'class' => '果物']
                    ['category' => 'りんご',
                    'class' => '果物']
                )
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
