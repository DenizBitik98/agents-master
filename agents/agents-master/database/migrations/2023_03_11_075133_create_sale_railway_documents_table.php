<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleRailwayDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_railway_document', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->nullable(false);
            $table->string('name', 200)->nullable(false);
            $table->string('dcts_code', 5)->nullable(false);
            $table->smallInteger('priority');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_railway_document');
    }
}
