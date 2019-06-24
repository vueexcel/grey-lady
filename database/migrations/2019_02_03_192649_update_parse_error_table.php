<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateParseErrorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('parseError')) {
            Schema::table('parseError', function (Blueprint $table) {
                if(!Schema::hasColumn('parseError', 'missingFields')){
                    $table->longText('missingFields')->nullable()->change();
                }
                if(!Schema::hasColumn('parseError', 'caughtErrors')){
                    $table->longText('caughtErrors')->nullable()->change();
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
        Schema::table('parseError', function($table) {
            $table->dropColumn('missingFields');
            $table->dropColumn('caughtErrors');
        });
    }
}
