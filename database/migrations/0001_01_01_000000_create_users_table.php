<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    // Définition des types d'utilisateurs
    private const TYPE_ADMIN  = 0;
    private const TYPE_AGENCE = 1;
    private const TYPE_CLIENT = 2;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Table users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('prenom')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('nom_du_responsable')->nullable();
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->text('adresse')->nullable();
            $table->string('logo')->nullable();
            $table->string('password');
            $table->string('sexe')->nullable();
            $table->tinyInteger('type')->default(self::TYPE_CLIENT); // 0=admin, 1=agence, 2=client
            $table->boolean('est_actif')->default(true); // nouvel ajout pour désactiver un compte si besoin
            $table->timestamp('email_verified_at')->nullable(); // vérification email
            $table->rememberToken();
            $table->timestamps();
        });

        // Table password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Table sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Insertion d'un superadmin par défaut
        DB::table('users')->insert([
            [
                'name' => 'Affou COULIBALY',
                'prenom' => 'Affou',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('Password123@'),
                'type' => self::TYPE_ADMIN,
                'nom_du_responsable' => 'Responsable Affou',
                'description' => 'Super administrateur',
                'sexe' => 'F',
                'telephone' => '0101010101',
                'adresse' => 'Abidjan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
