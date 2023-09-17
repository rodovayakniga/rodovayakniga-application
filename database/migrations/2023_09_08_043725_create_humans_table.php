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
        Schema::create('humans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('birth_id');
            $table->unsignedBigInteger('generations_id');
            $table->unsignedBigInteger('rodovayakniga_id');

            $table->foreign('birth_id')->references('id')->on('births');
            $table->foreign('generations_id')->references('id')->on('generations');
            $table->foreign('rodovayakniga_id')->references('id')->on('rodovayaknigas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humans');
    }
};
