<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleRailwayTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_railway_ticket', function (Blueprint $table) {
            $table->id('id');
            $table->integer('ticket_id')->nullable(false);
            $table->unsignedBigInteger('reservation_id')->nullable(false);
            $table->string('express_id', 16)->nullable(false);
            $table->double('cost')->nullable(false);
            $table->string('barcode', 1024)->nullable(false);
            $table->double('commission')->nullable(false);
            $table->string('api_id', 255)->nullable(false);
            $table->integer('status_id')->nullable(false);
            $table->string('payment_number', 128)->nullable(false);
            $table->double('tariff')->nullable(false);
            $table->double('tariff_b')->nullable(false);
            $table->double('tariff_p')->nullable(false);
            $table->double('tariff_service')->nullable(false);
            $table->double('tariff_nds')->nullable(false);
            $table->double('tariff_nds_service')->nullable(false);
            $table->double('tariff_dealer')->nullable(false);
            $table->double('tariff_total')->nullable(false);
            $table->boolean('el_reg_status')->nullable(false);
            $table->string('fiscal_number', 128)->nullable(false);
            $table->string('nds_certificate', 128)->nullable(false);
            $table->string('terminal', 128)->nullable(false);
            $table->boolean('wo_bedding')->nullable(false);
            $table->text('seats')->nullable(false);
            $table->string('discount', 50)->nullable(false);
            $table->smallInteger('tariff_type')->nullable(false);
            $table->double('tariff_pwithout_service')->nullable(false);
            $table->string('payment_info_rnm', 258)->nullable(false);
            $table->integer('tariff_dealer_nds')->nullable(false);
            $table->dateTime('stop_date')->nullable(false);
            $table->boolean('is_confirmed')->nullable(false);
            $table->string('fiscal_document_number', 50)->nullable(false);
            $table->integer('fiscalizator_type')->nullable(false);
            $table->dateTime('fiscal_date')->nullable(false);
            $table->string('qr_code', 1024)->nullable(false);
            $table->boolean('car_air_conditioning')->nullable(false);
            $table->boolean('eco_friendly_toilets')->nullable(false);

            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('sale_railway_reservation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_railway_ticket');
    }
}
