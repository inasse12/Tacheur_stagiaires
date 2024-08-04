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
        Schema::table('contacts', function (Blueprint $table) {
            // Supprimez la contrainte de clé étrangère existante
            $table->dropForeign(['travail_id']);

            // Ajoutez la nouvelle contrainte de clé étrangère avec `SET NULL`
            $table->foreign('travail_id')
                ->references('id')
                ->on('travails')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Supprimez la contrainte de clé étrangère modifiée
            $table->dropForeign(['travail_id']);

            // Rétablissez la contrainte de clé étrangère originale
            $table->foreign('travail_id')
                ->references('id')
                ->on('travails')
                ->onDelete('restrict'); // ou la contrainte d'origine
        });
    }
};
