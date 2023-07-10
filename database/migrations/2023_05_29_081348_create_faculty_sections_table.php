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
        Schema::create('faculty_sections', function (Blueprint $table) {
            $table->id('faculty_sections_id');
            $table->integer('course_faculty_assignments_id_for_check')->nullable();
            $table->string('courses_code',100)->nullable();
            $table->string('Section_no',100)->nullable();
            $table->string('faculties_id',100)->nullable();
            $table->text('iffacultysectionunice')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_sections');
    }
};
