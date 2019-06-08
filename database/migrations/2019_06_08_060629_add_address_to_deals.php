<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToDeals extends Migration
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
                if(!Schema::hasColumn('deals', 'property_address')){
                    $table->string('property_address')->after('name');
                }
                if(Schema::hasColumn('deals', 'description')){
                    $table->longText('description')->change();
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
            $table::dropColumn('property_address');
            $table::dropColumn('description');
        });
    }
}
