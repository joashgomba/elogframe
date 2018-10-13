<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_name');
            $table->text('task_description');
            $table->integer('rollingplan_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('annualworkplan_id')->unsigned()->index();
            $table->integer('mainactivity_id')->unsigned()->index();
            $table->integer('expectedoutput_id')->unsigned()->index();
            $table->integer('priority');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('rollingplan_id')->references('id')->on('rollingplans')->onDelete('CASCADE');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('CASCADE');
            $table->foreign('annualworkplan_id')->references('id')->on('annualworkplans')->onDelete('CASCADE');
            $table->foreign('mainactivity_id')->references('id')->on('mainactivities')->onDelete('CASCADE');
            $table->foreign('expectedoutput_id')->references('id')->on('expectedoutputs')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('tasks');
    }
}
