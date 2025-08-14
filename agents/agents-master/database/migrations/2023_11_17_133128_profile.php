<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('tariff_type')->nullable(false);
            $table->unsignedBigInteger('document_type_id')->nullable(false);
            $table->string('document', 255)->nullable(false);
            $table->string('surname', 255)->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->string('last_name', 255)->nullable(true);
            $table->string('passenger_iin', 255)->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->smallInteger('sex')->nullable(false);
            $table->string('phone', 255)->nullable(false);
            $table->unsignedBigInteger('citizenship_id')->nullable(false);
            $table->string('external_id', 255)->nullable(false);
            $table->string('note', 255)->nullable(true);
            $table->unsignedBigInteger('agent_id')->nullable(true);

            $table->timestamps();


            $table->foreign('document_type_id')->references('id')->on('sale_railway_document');
            $table->foreign('citizenship_id')->references('id')->on('country');
            $table->foreign('agent_id')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
