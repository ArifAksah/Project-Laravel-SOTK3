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
            // Mengubah kolom 'name' menjadi 'username'
            $table->renameColumn('name', 'username');

            // Menambahkan kolom 'role' dengan default 'quest'
            $table->enum('role', ['main', 'quest'])->default('quest')->after('password');

            // Menambahkan kolom 'is_approved' dengan default false
            $table->boolean('is_approved')->default(false)->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Mengembalikan perubahan jika dibatalkan
            $table->renameColumn('username', 'name');
            $table->dropColumn('role');
            $table->dropColumn('is_approved');
        });
    }
};
