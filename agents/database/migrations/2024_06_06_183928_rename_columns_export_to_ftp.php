<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsExportToFtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exportto_ftps', function (Blueprint $table) {
			$table->renameColumn('ftp_login', 'ftplog');
			$table->renameColumn('ftp_password', 'ftppass');			
			$table->renameColumn('ftp_address', 'ftpadd');			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exportto_ftps', function (Blueprint $table) {
			$table->renameColumn('ftplog', 'ftp_login');
			$table->renameColumn('ftppass', 'ftp_password');			
			$table->renameColumn('ftpadd', 'ftp_address');	
        });
    }
}
