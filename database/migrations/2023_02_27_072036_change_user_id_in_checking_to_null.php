<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserIdInCheckingToNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adminis_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable()->change();
        });
        Schema::table('car_ticket_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable()->change();
        });
        Schema::table('entry_ban_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable()->change();
        });
        Schema::table('tax_debt_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable()->change();
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
            $table->string('user_id')->nullable('false')->change();
        });
        Schema::table('car_ticket_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable('false')->change();
        });
        Schema::table('entry_ban_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable('false')->change();
        });
        Schema::table('tax_debt_checking', function (Blueprint $table) {
            $table->string('user_id')->nullable('false')->change();
        });
    }
}
