<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseridToListingstream extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('listingstream')) {
            Schema::table('listingstream', function (Blueprint $table) {
                if (!Schema::hasColumn('listingstream', 'user_id')) {
                    $table->string('user_id');
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
        Schema::table('listingstream', function (Blueprint $table) {
            $table::dropColumn('user_id');
        });
    }
}
