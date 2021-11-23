<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcrTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr_tests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned()->nullable(false);
            $table->date('date_of_test');
            $table->bigInteger('public_health_centre_id')->unsigned()->nullable(false);
            $table->bigInteger('public_health_worker_id')->unsigned()->nullable(false);
            $table->boolean('result');
            $table->date('date_of_result');
            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('public_health_centre_id')->references('id')->on('public_health_centres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('public_health_worker_id')->references('id')->on('public_health_workers')
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
        Schema::dropIfExists('pcr_tests');
    }
}
