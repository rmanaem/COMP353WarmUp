<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupZoneMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_zone_memberships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned()->nullable(false);
            $table->bigInteger('group_zone_id')->unsigned()->nullable(false);
            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('group_zone_id')->references('id')->on('group_zones')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['person_id', 'group_zone_id']);
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
        Schema::dropIfExists('group_zone_memberships');
    }
}
