<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskreportingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskreportings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('report_title');
            $table->date('reporting_date');
            $table->string('quarter');
            $table->integer('mainactivity_id')->unsigned()->index();
            $table->integer('expectedoutput_id')->unsigned()->index();
            $table->integer('performanceindicator_id')->unsigned()->index();
            $table->integer('task_id')->unsigned()->index();
            $table->string('output_target');
            $table->integer('status');//not started - 0%, on going-1% to 50%, near completion 51% t0 99%, completed - 100%
            $table->string('percentage_progress');
            $table->integer('target_met');//yes or no
            $table->string('target_numbers');
            $table->string('description_of_achievement');
            $table->string('attachment');
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('mainactivity_id')->references('id')->on('mainactivities')->onDelete('CASCADE');
            $table->foreign('expectedoutput_id')->references('id')->on('expectedoutputs')->onDelete('CASCADE');
            $table->foreign('performanceindicator_id')->references('id')->on('performanceindicators')->onDelete('CASCADE');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('CASCADE');
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
        Schema::dropIfExists('taskreportings');
    }
}
