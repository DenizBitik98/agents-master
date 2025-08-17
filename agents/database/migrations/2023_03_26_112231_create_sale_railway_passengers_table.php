<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleRailwayPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_railway_passengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->nullable(false);
            $table->string('name', 256)->nullable(false);
            $table->string('document', 256)->nullable(false);
            $table->date('birthday')->nullable(true);
            $table->string('citizenship', 256)->nullable(true);
            $table->boolean('sex')->nullable(true);
            $table->timestamps();


            $table->foreign('ticket_id')->references('id')->on('sale_railway_ticket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_railway_passengers');
    }
}
