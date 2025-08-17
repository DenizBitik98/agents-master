<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketWoBeddingChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_ticket', function (Blueprint $table) {
            $table->boolean('wo_bedding')->nullable(true)->change();
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
            $table->boolean('wo_bedding')->nullable(false)->change();
        });
    }
}
