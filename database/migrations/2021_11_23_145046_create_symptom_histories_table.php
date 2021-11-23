<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymptomHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptom_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned()->nullable(false);
            $table->date('date');
            $table->decimal('fever', 4, 2);
            $table->boolean('cough');
            $table->boolean('shortness_of_breath');
            $table->boolean('loss_of_taste');
            $table->boolean('loss_of_smell');
            $table->boolean('nausea');
            $table->boolean('stomach_ache');
            $table->boolean('vomiting');
            $table->boolean('headache');
            $table->boolean('muscle_pain');
            $table->boolean('diarrhea');
            $table->boolean('sore_throat');
            $table->string('other')->nullable(true);
            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('symptom_histories');
    }
}
