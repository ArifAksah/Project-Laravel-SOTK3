<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('findings', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_temuan')->nullable();
            $table->string('group');
            $table->string('plant');
            $table->string('area');
            $table->string('sub_area');
            $table->string('category');
            $table->string('status');
            $table->string('condition');
            $table->text('description')->nullable();
            $table->text('recommendation')->nullable();
            $table->date('inspection_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('findings');
    }
}
