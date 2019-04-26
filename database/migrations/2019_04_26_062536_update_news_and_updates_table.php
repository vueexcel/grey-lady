<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNewsAndUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('news_and_updates')) {
            Schema::table('news_and_updates', function (Blueprint $table) {
                if(!Schema::hasColumn('news_and_updates', 'type')){
                    $table->string('type')->after('body');
                }
                if(!Schema::hasColumn('news_and_updates', 'version')){
                    $table->string('version')->after('type');
                }
                if(!Schema::hasColumn('news_and_updates', 'download_link')){
                    $table->string('download_link')->after('version');
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
        Schema::table('news_and_updates', function (Blueprint $table) {
            $table::dropColumn('type');
            $table::dropColumn('version');
            $table::dropColumn('download_link');
        });
    }
}
