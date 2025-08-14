<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_ticket', function (Blueprint $table) {
            $table->dropColumn('fiscal_document_number');
            $table->dropColumn('fiscalizator_type');
            $table->dropColumn('fiscal_date');
            $table->dropColumn('qr_code');
        });

        Schema::table('sale_railway_ticket', function (Blueprint $table) {

            $table->string('fiscal_document_number', 50)->nullable(true);
            $table->integer('fiscalizator_type')->nullable(true);
            $table->dateTime('fiscal_date')->nullable(true);
            $table->string('qr_code', 1024)->nullable(true);
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
            $table->dropColumn('fiscal_document_number');
            $table->dropColumn('fiscalizator_type');
            $table->dropColumn('fiscal_date');
            $table->dropColumn('qr_code');
        });

        Schema::table('sale_railway_ticket', function (Blueprint $table) {

            $table->string('fiscal_document_number', 50)->nullable(false);
            $table->integer('fiscalizator_type')->nullable(false);
            $table->dateTime('fiscal_date')->nullable(false);
            $table->string('qr_code', 1024)->nullable(false);
        });
    }
}
