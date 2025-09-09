<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('image_proprietes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propriete_id');
            $table->string('image');
            $table->timestamps();    
            $table->foreign('propriete_id')  
                  ->references('id')
                  ->on('proprietes')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('image_proprietes');
    }
};
