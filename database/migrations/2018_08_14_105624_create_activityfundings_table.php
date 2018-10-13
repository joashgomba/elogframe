<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityfundingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activityfundings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sourceoffunding_id')->unsigned()->index();
            $table->integer('mainactivity_id')->unsigned()->index();

            $table->foreign('sourceoffunding_id')->references('id')->on('sourcesoffunding')->onDelete('CASCADE');
            $table->foreign('mainactivity_id')->references('id')->on('mainactivities')->onDelete('CASCADE');
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
        Schema::dropIfExists('activityfundings');
    }
}
