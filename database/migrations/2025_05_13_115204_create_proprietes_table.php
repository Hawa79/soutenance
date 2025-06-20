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
            $table->unsignedBigInteger('agence_id');
            $table->string('nom');
            $table->text('description');
            $table->string('adresse');
            $table->string('pays');
            $table->string('ville');
            $table->string('quartier');
            $table->string('type');
            $table->integer('nombre_de_chambres');
            $table->integer('salle_de_bains');
            $table->string('proposition');
            $table->year('annee_de_construction');
            $table->integer('prix');
            $table->timestamps();

            // Clé étrangère vers la table agences
            $table->foreign('agence_id')
                  ->references('id')
                  ->on('agences')
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
