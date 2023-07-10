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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blogs_id');
            $table->string('name',100);
            $table->string('blog_catagory_id',100)->nullable();
            $table->string('blog_tags',100)->nullable();
            $table->string('short_desc',100)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
