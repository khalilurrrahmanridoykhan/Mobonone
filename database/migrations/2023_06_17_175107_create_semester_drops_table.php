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
        Schema::create('semester_drops', function (Blueprint $table) {
            $table->id('semester_drops_id');
            $table->string('student_id')->nullable();
            $table->string('semester',100)->nullable();
            $table->text('comment',100)->nullable();
            $table->string('file_path')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_drops');
    }
};
