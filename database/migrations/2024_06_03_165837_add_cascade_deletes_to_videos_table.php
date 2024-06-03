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
        Schema::table('videos', function (Blueprint $table) {
            // Suppression de l'ancienne clé étrangère
            $table->dropForeign(['chapter_id']);

            // Ajout de la nouvelle clé étrangère avec la suppression en cascade
            $table->foreign('chapter_id')
                ->references('id')
                ->on('chapters')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);

            // Ajout de l'ancienne clé étrangère sans suppression en cascade
            $table->foreign('chapter_id')
                ->references('id')
                ->on('chapters');
        });
    }
};
