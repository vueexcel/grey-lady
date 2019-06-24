<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FavoriteZips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('favorite_zips')) {
            Schema::create('favorite_zips', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('zip_code');
                $table->text('zip_code_town');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('favorite_zips');

    }
}
