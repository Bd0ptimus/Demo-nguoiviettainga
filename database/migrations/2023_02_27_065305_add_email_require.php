<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailRequire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adminis_checking', function (Blueprint $table) {
            $table->string('email_require')->nullable()->after('response_require');
        });
        Schema::table('car_ticket_checking', function (Blueprint $table) {
            $table->string('email_require')->nullable()->after('response_require');
        });
        Schema::table('entry_ban_checking', function (Blueprint $table) {
            $table->string('email_require')->nullable()->after('response_require');
        });
        Schema::table('tax_debt_checking', function (Blueprint $table) {
            $table->string('email_require')->nullable()->after('response_require');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adminis_checking', function (Blueprint $table) {
            $table->dropColumn('email_require');
        });

        Schema::table('car_ticket_checking', function (Blueprint $table) {
            $table->dropColumn('email_require');
        });

        Schema::table('entry_ban_checking', function (Blueprint $table) {
            $table->dropColumn('email_require');
        });

        Schema::table('tax_debt_checking', function (Blueprint $table) {
            $table->dropColumn('email_require');
        });
    }
}
