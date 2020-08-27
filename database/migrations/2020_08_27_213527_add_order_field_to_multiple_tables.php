<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderFieldToMultipleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('order')->after('is_confirmed')->default(0);
        });

        Schema::table('materials', function(Blueprint $table) {
            $table->unsignedBigInteger('order')->after('body')->default(0);
        });

        Schema::table('courses', function(Blueprint $table) {
            $table->unsignedBigInteger('order')->after('ends_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('order');
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('order');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
