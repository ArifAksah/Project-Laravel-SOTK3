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
        Schema::create('admin_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps(); // created_at dan updated_at otomatis dibuat
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_approvals');
    }
};
