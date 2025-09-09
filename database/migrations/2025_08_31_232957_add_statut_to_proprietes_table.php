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
    Schema::table('proprietes', function (Blueprint $table) {
        $table->enum('statut', ['disponible', 'en_attente', 'vendu', 'louee'])
              ->default('disponible')
              ->after('disponible'); // met après la colonne "disponible" si tu veux
    });
}

public function down(): void
{
    Schema::table('proprietes', function (Blueprint $table) {
        $table->dropColumn('statut');
    });
}
};