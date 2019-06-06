<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('deals')) {
            Schema::table('deals', function (Blueprint $table) {
                if(!Schema::hasColumn('deals', 'beds')){
                    $table->string('beds')->after('description');
                }
                if(!Schema::hasColumn('deals', 'baths')){
                    $table->string('baths')->after('beds');
                }
                if(!Schema::hasColumn('deals', 'price')){
                    $table->string('price')->after('baths');
                }
                if(!Schema::hasColumn('deals', 'living_area')){
                    $table->string('living_area')->after('price');
                }
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
        Schema::table('deals', function (Blueprint $table) {
            $table::dropColumn('beds');
            $table::dropColumn('baths');
            $table::dropColumn('price');
            $table::dropColumn('living_area');
        });
    }
}
