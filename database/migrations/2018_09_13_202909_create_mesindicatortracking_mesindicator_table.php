<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesindicatortrackingMesindicatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesindicatortracking_mesindicator', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county_value');
            $table->string('subcounty_value');
            $table->integer('mesindicatortracking_id')->unsigned()->index();
            $table->integer('mesindicator_id')->unsigned()->index();

            $table->foreign('mesindicatortracking_id','mesindicatortracking_id_foreign')->references('id')->on('mesindicatortrackings')->onDelete('CASCADE');
            $table->foreign('mesindicator_id','mesindicator_id_foreign')->references('id')->on('mesindicators')->onDelete('CASCADE');
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
        Schema::dropIfExists('mesindicatortracking_mesindicator');
    }
}
