<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_reservation', function (Blueprint $table) {
            $table->string('sign_gb', 258)->nullable(true)->change();
            $table->string('carrier_inn', 258)->nullable(true)->change();
            $table->string('car_carrier_name', 258)->nullable(true)->change();
            $table->string('payer_info_name', 258)->nullable(true)->change();
            $table->string('payer_info_bin', 258)->nullable(true)->change();
            $table->boolean('payer_info_is_agent')->nullable(true)->change();
            $table->boolean('payer_info_is_vat_charged')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
