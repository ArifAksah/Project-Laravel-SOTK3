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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('plant');  // Plant
            $table->string('area');  // Area
            $table->string('sub_area');  // Sub-Area
            $table->string('category');  // Category
            $table->string('status');  // Status
            $table->text('condition');  // Condition
            $table->text('description');  // Description
            $table->text('recommendation');  // Recommendation
            $table->date('inspection_date');  // Inspection Date
            $table->string('reporten');  // Reporten (user login)
            $table->timestamps();  // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
