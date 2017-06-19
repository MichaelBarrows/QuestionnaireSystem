<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creates the questions table
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('number');
            $table->string('title');
            $table->string('type');
            $table->integer('questionnaire_id')->unsigned();
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade');
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
        Schema::drop('questions');
    }
}
