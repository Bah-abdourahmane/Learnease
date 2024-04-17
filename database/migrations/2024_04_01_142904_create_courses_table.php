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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('level', ['beginner', 'intermediate', 'advenced'])->default("beginner");
            $table->string('cover_photo')->nullable();
            $table->foreignId('domains_id')->constrained('domains');
            $table->foreignId('instructor_id')->constrained('users');
            $table->boolean('is_approved')->default(false);
            $table->dateTime('publish_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
