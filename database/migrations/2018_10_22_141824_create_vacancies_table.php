<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();;
            $table->string('title');
            $table->text('description');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->string('work_day')->nullable();
            $table->string('part_time')->nullable();
            $table->string('contact');
            $table->string('phone');
            $table->string('city')->nullable();;
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
        Schema::dropIfExists('vacancies');
    }
}
