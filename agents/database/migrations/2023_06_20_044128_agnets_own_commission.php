<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgnetsOwnCommission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->float('own_commission')->nullable(true)->default(0);
        });

        Schema::table('sale_railway_ticket', function (Blueprint $table) {
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
        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn('own_commission');
        });

        Schema::table('sale_railway_ticket', function (Blueprint $table) {
            $table->dropColumn('agents_own_commission');
        });
    }
}
