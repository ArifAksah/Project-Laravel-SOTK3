<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('admin_approvals', function (Blueprint $table) {
            $table->boolean('is_approved')->default(false)->after('approved_at');
        });
    }

    /**
     * Hapus kolom 'is_approved' dari tabel 'approvals'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_approvals', function (Blueprint $table) {
            $table->dropColumn('is_approved');
        });
    }
};
