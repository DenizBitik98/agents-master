<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixBalanceTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balance_transaction', function (Blueprint $table) {
            $table->dropColumn('order_number');
        });

        Schema::table('balance_transaction', function (Blueprint $table) {

            $table->string('order_number', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balance_transaction', function (Blueprint $table) {

            $table->dropColumn('order_number');
        });

        Schema::table('balance_transaction', function (Blueprint $table) {

            $table->float('order_number');
        });
    }
}
