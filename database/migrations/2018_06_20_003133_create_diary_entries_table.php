<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaryEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // Mood
            $table->integer('mood')->unsigned();

            // Sleep
            $table->integer('sleep')->unsigned()->nullable();

            // Exercise
            $table->integer('exercise')->unsigned()->nullable();

            // Alcohol Consumption
            $table->integer('alcohol')->unsigned()->nullable();

            // Energy
            $table->integer('energy')->unsigned()->nullable();

            // Others
            $table->boolean('cigarettes')->default(false);
            $table->boolean('recreational_drugs')->default(false);
            $table->boolean('self_harm')->default(false);
            $table->boolean('other')->default(false);

            // Cravings
            $table->boolean('craving_sweet')->default(false);
            $table->boolean('craving_salty')->default(false);
            $table->boolean('craving_carbohydrate')->default(false);

            // Meditation
            $table->integer('meditation')->unsigned()->nullable();

            // Abnormal Behaviours
            $table->boolean('gambling')->default(false);
            $table->boolean('over_spending')->default(false);
            $table->boolean('irritability')->default(false);
            $table->boolean('anxious')->default(false);
            $table->boolean('mood_swings')->default(false)->boolean();
            $table->boolean('over_eating')->default(false)->boolean();
            $table->boolean('hypersexuality')->default(false)->boolean();
            $table->boolean('delusions_hallucinations')->default(false)->boolean();
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
        Schema::drop('diary_entries');
    }
}
