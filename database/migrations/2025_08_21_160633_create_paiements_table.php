<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();

            // Référence à la propriété
            $table->foreignId('propriete_id')->constrained('proprietes')->onDelete('cascade');

            // Référence à l'utilisateur (client)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Référence à l'agence (doit être user type=1)
            $table->foreignId('agence_id')->constrained('users')->onDelete('cascade');

            // Détails du paiement
            $table->decimal('montant', 15, 2);
            $table->enum('type', ['achat','location'])->nullable(); // achat ou location
            $table->enum('status', ['en_attente','paye','refuse','annule'])->default('en_attente');
            $table->string('telephone')->nullable(); // numéro pour simulation de paiement
            $table->enum('frequence', ['par mois', 'par an','par semaine'])->nullable(); // pour location

            // Durée et unité (pour location)
            $table->integer('duree')->nullable();
            $table->string('unite_duree')->nullable(); // mois ou ans

            // Dates de location
            $table->date('date_debut_location')->nullable();
            $table->date('date_fin_location')->nullable();

            // Référence unique du paiement (pour le reçu)
            $table->string('reference_transaction')->nullable()->unique();

            // Notes ou informations supplémentaires
            $table->text('notes')->nullable();

            // Date du paiement
            $table->timestamp('date_paiement')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
