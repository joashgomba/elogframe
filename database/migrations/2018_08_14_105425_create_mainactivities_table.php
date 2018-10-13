<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainactivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainactivities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('annualworkplan_id')->unsigned()->index();
            $table->integer('resultarea_id')->unsigned()->index();
            $table->string('activity_name');
            $table->integer('quarter_one');
            $table->integer('quarter_two');
            $table->integer('quarter_three');
            $table->integer('quarter_four');
            $table->string('cost_requirements');
            $table->string('on_budget_amount');
            $table->string('off_budget_amount');
            $table->string('finding_gap');
            $table->foreign('annualworkplan_id')->references('id')->on('annualworkplans')->onDelete('CASCADE');
            $table->foreign('resultarea_id')->references('id')->on('resultareas')->onDelete('CASCADE');
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
        Schema::dropIfExists('mainactivities');
    }
}

//ALTER TABLE elogframe.mainactivities add FOREIGN KEY (annualworkplan_id) REFERENCES annualworkplans(id) ON DELETE CASCADE