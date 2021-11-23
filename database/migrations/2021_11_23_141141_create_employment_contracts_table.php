<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('public_health_worker_id')->unsigned()->nullable(false);
            $table->bigInteger('public_health_centre_id')->unsigned()->nullable(false);
            $table->date('start_date');
            $table->date('end_date')->nullable(true);
            $table->string('schedule');
            $table->foreign('public_health_worker_id')->references('id')->on('public_health_workers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('public_health_centre_id')->references('id')->on('public_health_centres')
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
        Schema::dropIfExists('employment_contracts');
    }
}
