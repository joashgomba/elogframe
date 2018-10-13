<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpectedoutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expectedoutputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('output');
            $table->integer('mainactivity_id')->unsigned()->index();
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
        Schema::dropIfExists('expectedoutputs');
    }
}
