<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationAliasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_aliases', function (Blueprint $table) {
            $table->id();
            $table->string('station_code', 8)->nullable(false);
            $table->string('station_name', 50)->nullable(false);
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
        Schema::dropIfExists('station_aliases');
    }
}
