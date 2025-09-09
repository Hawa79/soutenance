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
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();

            // Lien vers la table users
            $table->unsignedBigInteger('agence_id');
            
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->string('type')->nullable();
            
            // Colonnes numériques avec valeurs par défaut
            $table->integer('nombre_de_chambres')->default(1);
            $table->integer('salle_de_bains')->default(1);
            $table->year('annee_de_construction')->nullable();
            $table->integer('prix')->default(0);

            $table->string('type_transaction')->default('location');
            $table->boolean('disponible')->default(true);

            $table->timestamps();

            // Lier à users et non à agences
            $table->foreign('agence_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietes');
    }
};
