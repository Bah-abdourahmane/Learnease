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
        Schema::table('chapters', function (Blueprint $table) {
            // Suppression de l'ancienne clé étrangère
            $table->dropForeign(['course_id']);

            // Ajout de la nouvelle clé étrangère avec la suppression en cascade
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            // Suppression de la clé étrangère avec la suppression en cascade
            $table->dropForeign(['course_id']);

            // Ajout de l'ancienne clé étrangère sans suppression en cascade
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
        });
    }
};
