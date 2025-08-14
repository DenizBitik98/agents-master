<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketReturn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_railway_ticket_return', function (Blueprint $table) {
            $table->id('id');
            $table->integer('ticket_id')->nullable(false);
            $table->smallInteger('status')->nullable(false);
            $table->double('amount')->nullable(true);
            $table->double('commission')->nullable(true);
            $table->string('payment_number', 255)->nullable(true);
            $table->string('krs', 128)->nullable(true);
            $table->dateTime('time_before_departure')->nullable(true);
            $table->dateTime('returned_at')->nullable(true);
            $table->string('transaction_id', 255)->nullable(false);
            $table->string('fks', 255)->nullable(true);
            $table->string('reject_error_code', 255)->nullable(true);
            $table->integer('author_id')->nullable(true);


            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('sale_railway_ticket');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_railway_ticket_return');
    }
}
