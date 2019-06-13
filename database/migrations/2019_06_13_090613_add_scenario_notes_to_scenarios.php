<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScenarioNotesToScenarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('scenarios')) {
            Schema::table('scenarios', function (Blueprint $table) {
                if(!Schema::hasColumn('scenarios', 'scenario_notes')){
                    $table->longText('scenario_notes')->after('monthly_mortgage_payment_30yr');
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
        Schema::table('scenarios', function (Blueprint $table) {
            $table::dropColumn('scenario_notes');
        });
    }
}
