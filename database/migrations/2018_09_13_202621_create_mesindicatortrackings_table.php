<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesindicatortrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesindicatortrackings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('reporting_date');
            $table->integer('rollingplan_id')->unsigned()->index();
            $table->string('quarter');
            $table->integer('county_id')->unsigned()->index();
            $table->integer('indicatorcategory_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('rollingplan_id')->references('id')->on('rollingplans')->onDelete('CASCADE');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('CASCADE');
            $table->foreign('indicatorcategory_id')->references('id')->on('indicatorcategories')->onDelete('CASCADE');
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
        Schema::dropIfExists('mesindicatortrackings');
    }
}
