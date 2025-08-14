<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RailwayReservationModelExtend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_reservation', function (Blueprint $table) {

            $table->string('api_id', 255)->nullable(true);
            $table->string('carrier_name', 255)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_railway_reservation', function (Blueprint $table) {

            $table->dropColumn('api_id');
            $table->dropColumn('carrier_name');
        });
    }
}
