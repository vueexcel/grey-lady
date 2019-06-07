<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deal_id');
            $table->string('scenario_name');
            $table->string('purchase_price');
            $table->string('renovation_inc_mortgage');
            $table->string('total_cost');
            $table->string('after_repair_value');
            $table->string('amount_financed');
            $table->string('loan_to_value');
            $table->string('downpayment');
            $table->string('closing_costs');
            $table->string('renovation_not_inc_mortgage');
            $table->string('total_cash_needed');
            $table->string('monthly_mortgage_payment_30yr');
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
        Schema::dropIfExists('scenarios');
    }
}
