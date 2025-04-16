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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade'); // le client qui loue
            $table->foreignId('propriete_id')->constrained()->onDelete('cascade'); // la propriété louée
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->decimal('montant_loyer', 10, 2);
            $table->string('etat')->default('en cours'); // en cours, terminé, annulé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
