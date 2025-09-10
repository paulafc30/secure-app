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
        Schema::table('users', function (Blueprint $table) {
            // Añade la nueva columna para el tipo de usuario.
            // Por defecto, la establecemos como 'client' para los nuevos registros.
            $table->string('user_type')->default('client')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Elimina la columna user_type si la migración se revierte.
            $table->dropColumn('user_type');
        });
    }
};
