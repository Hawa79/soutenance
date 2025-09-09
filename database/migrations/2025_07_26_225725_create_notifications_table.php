<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); // Titre de la notification
            $table->text('contenu'); // Contenu détaillé
            $table->enum('type', ['paiement', 'nouvelle_propriete', 'validation', 'rejet', 'autre'])->default('autre');
            $table->boolean('lu')->default(false); // Lu ou non

            // Polymorphic relation pour multi-user (client, agence, admin)
            $table->unsignedBigInteger('notifiable_id');
            $table->string('notifiable_type');
            $table->index(['notifiable_id', 'notifiable_type']);

            // Optionnel : lien vers la page de détail
            $table->string('url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
