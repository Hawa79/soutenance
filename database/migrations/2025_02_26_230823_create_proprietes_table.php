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
            $table->string('type');
            $table->string('adresse');
            $table->decimal('prix', 10, 2);
            $table->string('statut');
            $table->string('photos')->nullable();
            $table->unsignedBigInteger('id_agence');
            $table->foreign('id_agence')->references('id')->on('agences')->onDelete('cascade');
            $table->timestamps();
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
