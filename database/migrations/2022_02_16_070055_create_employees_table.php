<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('emp_id')->unique();
            $table->string('department');
            $table->string('designation');
            $table->integer('leaves_alloted');
            $table->string('address');
            $table->date('date_of_birth');
            $table->date('date_of_join');
            $table->string('blood_group');
            $table->string('emergency_contact_no');
            $table->string('relation');
            $table->string('pan')->unique();
            $table->string('aadhar_no')->unique();
            $table->string('passport_no')->unique();
            $table->string('education');
            $table->string('experience');
            $table->string('role');
            $table->string('report_to');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('technologies');
            $table->string('current_project');
            $table->string('status');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('employees');
    }
}
