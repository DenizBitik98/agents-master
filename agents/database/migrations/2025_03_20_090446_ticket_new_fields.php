<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_ticket', function (Blueprint $table) {
            $table->string('cash_receipt_url', 1024)->nullable(true);
            $table->string('carry_on_baggage_url', 1024)->nullable(true);
            $table->string('seats_type', 1)->nullable(true);
        });

        Schema::table('sale_railway_passengers', function (Blueprint $table) {
            $table->string('iin', 50)->nullable(true);
            $table->string('internal_document', 256)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_railway_ticket', function (Blueprint $table) {
            $table->dropColumn('cash_receipt_url');
            $table->dropColumn('carry_on_baggage_url');
            $table->dropColumn('seats_type');
        });

        Schema::table('sale_railway_passengers', function (Blueprint $table) {
            $table->dropColumn('iin');
            $table->dropColumn('internal_document');
        });
    }
}
