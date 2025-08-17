<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleRailwayReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_railway_reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departure_station_id')->nullable(false);
            $table->unsignedBigInteger('arrival_station_id')->nullable(false);
            $table->unsignedBigInteger('reservation_id')->nullable(false);

            $table->string('express_id', 16)->nullable(false);
            $table->dateTime('departure_time', 255)->nullable(false);
            $table->dateTime('arrival_time', 255)->nullable(false);
            $table->string('iidb', 64)->nullable(false);
            $table->integer('status')->nullable(false);
            $table->dateTime('reserved_at')->nullable(false);
            $table->boolean('payment_type')->nullable(false);
            $table->string('departure_train', 255)->nullable(false);
            $table->string('arrival_train', 255)->nullable(false);
            $table->boolean('is_talgo')->nullable(false);
            $table->string('car', 255)->nullable(false);
            $table->string('carrier', 255)->nullable(false);
            $table->string('bin', 255)->nullable(false);
            $table->string('nds', 255)->nullable(false);
            $table->string('service_class', 128)->nullable(false);
            $table->smallInteger('car_type')->nullable(false);
            $table->string('sign_gb', 258)->nullable(false);
            $table->string('carrier_inn', 258)->nullable(false);
            $table->string('car_carrier_name', 258)->nullable(false);
            $table->string('payer_info_name', 258)->nullable(false);
            $table->string('payer_info_bin', 258)->nullable(false);
            $table->boolean('payer_info_is_agent')->nullable(false);
            $table->boolean('payer_info_is_vat_charged')->nullable(false);
            $table->string('terminal_name', 258)->nullable(false);
            $table->string('terminal_znkkm', 258)->nullable(false);
            $table->integer('departure_time_zone')->nullable(false);
            $table->integer('arrival_time_zone')->nullable(false);
            $table->integer('is_confirmed')->nullable(false);
            $table->integer('is_available_for_confirm')->nullable(false);

            $table->timestamps();

            $table->foreign('departure_station_id')->references('id')->on('sale_railway_station');
            $table->foreign('arrival_station_id')->references('id')->on('sale_railway_station');
            $table->foreign('reservation_id')->references('id')->on('reservation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_railway_reservation');
    }
}
