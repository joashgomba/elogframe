<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskhumanresourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskhumanresources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('taskhumanresources');
    }
}
