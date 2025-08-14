<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleRailwayStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_railway_station', function (Blueprint $table) {
            $table->id();
            $table->string('station_code', 8)->nullable(false);
            $table->string('station_name_short', 50)->nullable(false);
            $table->string('station_name_full', 300)->nullable(false);
            $table->string('railway_code', 16)->nullable(false);
            $table->string('railway_tlf', 9)->nullable(false);
            $table->string('railway_name', 300)->nullable(false);
            $table->string('country_code', 16)->nullable(false);
            $table->string('country_tlf', 7)->nullable(false);
            $table->string('country_name', 300)->nullable(false);
            $table->string('base_code', 7)->nullable(true);
            $table->string('sep_number', 16)->nullable(false);
            $table->string('sf', 9)->nullable(true);
            $table->string('okato', 10)->nullable(true);
            $table->boolean('base_station')->nullable(true);
            $table->dateTime('date_modified')->nullable(false);
            $table->integer('station_type')->nullable(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_railway_station');
    }
}
