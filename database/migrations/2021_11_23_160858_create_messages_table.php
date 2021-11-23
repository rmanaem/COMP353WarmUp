<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned()->nullable(false);
            $table->bigInteger('template_id')->unsigned()->nullable(false);
            $table->boolean('message_read');
            $table->mediumText('text');
            $table->dateTime('date_time');
            $table->bigInteger('old_alert_id')->unsigned()->nullable(false);
            $table->bigInteger('new_alert_id')->unsigned()->nullable(false);
            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('template_id')->references('id')->on('message_templates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('old_alert_id')->references('id')->on('alert_levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('new_alert_id')->references('id')->on('alert_levels')
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
        Schema::dropIfExists('messages');
    }
}
