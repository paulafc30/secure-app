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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('permission_type');
            $table->foreignId('folder_id')->constrained('folders')->onDelete('restrict');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            // Asegura que solo un permiso de un tipo específico exista para un usuario y una carpeta.
            $table->unique(['user_id', 'folder_id', 'permission_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
