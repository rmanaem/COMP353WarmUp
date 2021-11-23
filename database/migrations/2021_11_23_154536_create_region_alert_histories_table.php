<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRegionAlertHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_alert_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('region_id')->unsigned()->nullable(false);
            $table->bigInteger('alert_level_id')->unsigned()->nullable(false);
            $table->date('end_date')->nullable(true);
            $table->foreign('region_id')->references('id')->on('regions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('alert_level_id')->references('id')->on('alert_levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        DB::statement("UPDATE region_alert_histories SET end_date = '2016-12-30' WHERE id = 1;");
        DB::statement("UPDATE region_alert_histories SET end_date = '2019-05-08' WHERE id = 2;");
        DB::statement("UPDATE region_alert_histories SET end_date = '2019-07-18' WHERE id = 4;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_alert_histories');
    }
}
