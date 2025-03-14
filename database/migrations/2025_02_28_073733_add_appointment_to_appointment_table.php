<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointmentToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Appointment', function (Blueprint $table) {
            //
            $table->string('prefix')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('id_card', 191)->unique(); // Limit to 191 characters
            $table->date('birthdate')->nullable();
            $table->string('phone');
            $table->dateTime('appointment_date');
            $table->string('admin_approve_status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Appointment', function (Blueprint $table) {
            //
        });
    }
}
