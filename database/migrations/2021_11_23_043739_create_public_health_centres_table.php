<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePublicHealthCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_health_centres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->char('phone_number', 15);
            $table->string('website');
            $table->char('type', 1);
            $table->boolean('drive_through');
            $table->integer('appointment_type');
            $table->unique(['name', 'address', 'type']);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE public_health_centres ADD CONSTRAINT chk_type CHECK (TYPE IN ('h', 'c', 's'));");
        DB::statement("ALTER TABLE public_health_centres ADD CONSTRAINT chk_appointment_type CHECK (appointment_type IN (0, 1, 2));");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_health_centres');
    }
}
