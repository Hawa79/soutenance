<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Statut de la notification : en attente, validée, refusée
            $table->enum('status', ['en_attente', 'valide', 'refuse'])->default('en_attente')->after('type');

            // Priorité de la notification : basse, moyenne, haute
            $table->enum('priority', ['basse', 'moyenne', 'haute'])->default('moyenne')->after('status');

            // ID du client lié à la notification (facultatif)
            $table->unsignedBigInteger('client_id')->nullable()->after('notifiable_type');

            // Date de la notification
            $table->dateTime('date_notification')->nullable()->after('client_id');
            
            // Index pour faciliter les recherches
            $table->index('status');
            $table->index('client_id');
        });
    }

    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['status', 'priority', 'client_id', 'date_notification']);
            $table->dropIndex(['status']);
            $table->dropIndex(['client_id']);
        });
    }
};
