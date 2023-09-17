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
        Schema::create('full_names', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('sur_name', 255)->nullable();
            $table->unsignedBigInteger('human_id');
            $table->timestamps();

            $table->foreign('human_id')->references('id')->on('humans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('full_names');
    }
};
