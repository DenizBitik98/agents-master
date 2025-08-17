<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationCommission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_reservation', function (Blueprint $table) {

            $table->string('direction', 50)->nullable(true);
            $table->float('system_commission')->nullable(true)->default(0);
            $table->float('agents_own_commission')->nullable(true)->default(0);
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

            $table->dropColumn('direction');
            $table->dropColumn('system_commission');
            $table->dropColumn('agents_own_commission');
        });
    }
}
