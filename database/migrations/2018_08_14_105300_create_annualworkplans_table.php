<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualworkplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annualworkplans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned()->index();
            $table->integer('division_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('rollingplan_id')->unsigned()->index();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('CASCADE');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('CASCADE');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('CASCADE');
            $table->foreign('rollingplan_id')->references('id')->on('rollingplans')->onDelete('CASCADE');
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
        Schema::dropIfExists('annualworkplans');
    }
}
