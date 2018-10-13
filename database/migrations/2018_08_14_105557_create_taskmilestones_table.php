<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskmilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskmilestones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('milestone');
            $table->date('milestone_date');
            $table->integer('task_id')->unsigned()->index();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('CASCADE');
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
        Schema::dropIfExists('taskmilestones');
    }
}
