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
            $table->foreign('agence_id')->references('id')->on('agences')->onDelete('cascade');
            $table->string('nom');                      // le nom de la propriété
            $table->text('description');                // description complète
            $table->string('adresse');
            $table->string('pays');
            $table->string('ville');
            $table->string('quartier');
            $table->string('type');
            $table->string('nombre_de_chambres');
            $table->string('salle_de_bains');
            $table->string('proposition');
            $table->year('annee_de_construction');
            $table->decimal('prix', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proprietes');
    }
};
     