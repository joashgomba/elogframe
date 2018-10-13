<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollingplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollingplans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_year');
            $table->string('end_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('quarter_one_start_date');
            $table->date('quarter_one_end_date');
            $table->date('quarter_two_start_date');
            $table->date('quarter_two_end_date');
            $table->date('quarter_three_start_date');
            $table->date('quarter_three_end_date');
            $table->date('quarter_four_start_date');
            $table->date('quarter_four_end_date');
            $table->integer('division_id')->unsigned()->index();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('CASCADE');
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
        Schema::dropIfExists('rollingplans');
    }
}
