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
        Schema::create('who_is', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('human_id1');
            $table->unsignedBigInteger('human_id2');
            $table->timestamps();

            $table->foreign('human_id1')->references('id')->on('humans');
            $table->foreign('human_id2')->references('id')->on('humans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('who_is');
    }
};
