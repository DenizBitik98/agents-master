<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExportToFtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_to_ftp', function (Blueprint $table) {
            $table->id();
            $table->string('agent_id')->nullable(false);
            $table->string('company_name', 50)->nullable(true);		
            $table->string('user_id')->nullable(true);
            $table->dateTime('date_start')->nullable(true);
            $table->boolean('is_active')->nullable(false);	
            $table->string('ftp_login', 50)->nullable(false);		
            $table->string('ftp_password', 50)->nullable(false);		
            $table->string('ftp_address', 50)->nullable(false);		
            $table->string('comment', 50)->nullable(true);					
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
        Schema::dropIfExists('export_to_ftp');
    }
}
