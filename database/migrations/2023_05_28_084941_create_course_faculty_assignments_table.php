<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_faculty_assignments', function (Blueprint $table) {
            $table->id('course_faculty_assignments_id');
            $table->string('course',100)->nullable();
            $table->string('Section',100)->nullable();
            $table->string('faculty',100)->nullable();
            $table->string('time',100)->nullable();
            $table->string('day',100)->nullable();
            $table->string('room_no_for_class', 100)->nullable();
            $table->string('year',100)->nullable();
            $table->string('semester',100)->nullable();
            $table->text('iffacultyisunice')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            // $table->unsignedBigInteger('courses_id');
            // $table->unsignedBigInteger('sections_id');
            // $table->unsignedBigInteger('faculties_id');
            // $table->unsignedBigInteger('time_slots_id');
            // $table->unsignedBigInteger('uni_other_infos_id');
            // $table->foreign('courses_id')->references('courses_id')->on('courses');
            // $table->foreign('sections_id')->references('sections_id')->on('sections');
            // $table->foreign('faculties_id')->references('faculties_id')->on('faculties');
            // $table->foreign('time_slots_id')->references('time_slots_id')->on('time_slots');
            // $table->foreign('uni_other_infos_id')->references('uni_other_infos_id')->on('uni_other_infos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_faculty_assignments');
    }
};
