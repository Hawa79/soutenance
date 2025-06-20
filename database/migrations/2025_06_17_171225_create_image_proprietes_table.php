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
        Schema::create('image_proprietes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propriete_id');
            $table->string('image');
            $table->timestamps();    
            $table->foreign('propriete_id')   // Contrainte de clé étrangère
                  ->references('id')
                  ->on('proprietes')
                  ->onDelete('cascade'); // Supprimer les images si la propriété est supprimée
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_proprietes');
    }
};
