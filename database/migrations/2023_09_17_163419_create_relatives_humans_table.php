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
        Schema::create('relatives_humans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('human_id');
            $table->string('who_is', 255);

            $table->foreign('human_id')->references('id')->on('humans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatives_humans');
    }
};
