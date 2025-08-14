<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManualReturnUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_ticket_return', function($table) {
            $table->dateTime('manual_return_kassa_date')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_railway_ticket_return', function($table) {
            $table->dropColumn('manual_return_kassa_date');
        });
    }
}
