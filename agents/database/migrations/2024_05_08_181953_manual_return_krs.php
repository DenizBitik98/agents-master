<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManualReturnKrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_railway_ticket_return', function($table) {
            $table->string('mr_krs_filename')->nullable(true);
            $table->string('mr_krs_fileimage')->nullable(true);		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_railway_ticket_return', function($table) {
            $table->dropColumn('mr_krs_filename');
            $table->dropColumn('mr_krs_fileimage');				
        });
    }
}
