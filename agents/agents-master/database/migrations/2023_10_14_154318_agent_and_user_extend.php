<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgentAndUserExtend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->boolean('is_blocked')->nullable(true);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_blocked')->nullable(true);
            $table->string('fio')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn('is_blocked');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_blocked');
            $table->dropColumn('fio');
        });
    }
}
