<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->char('medicare_id', 12)->unique();
            $table->char('phone_number', 15)->nullable(true);
            $table->string('address');
            $table->bigInteger('postal_code_id')->unsigned()->nullable(false);
            $table->string('citizenship');
            $table->string('email_address')->nullable(true);
            $table->foreign('postal_code_id')->references('id')->on('postal_codes')
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
        Schema::dropIfExists('people');
    }
}
