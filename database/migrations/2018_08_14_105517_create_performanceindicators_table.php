<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceindicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performanceindicators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indicator');
            $table->string('target_output');
            $table->string('means_of_verification');
            $table->integer('expectedoutput_id')->unsigned()->index();
            $table->foreign('expectedoutput_id')->references('id')->on('expectedoutputs')->onDelete('CASCADE');
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
        Schema::dropIfExists('performanceindicators');
    }
}
