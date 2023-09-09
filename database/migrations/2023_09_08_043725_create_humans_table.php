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
            $table->string('name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('sur_name', 255)->nullable();

            $table->unsignedBigInteger('birth_id');
            $table->unsignedBigInteger('generations_id');
            $table->unsignedBigInteger('father_id');
            $table->unsignedBigInteger('mother_id');
            $table->unsignedBigInteger('brothers_or_sisters_id');
            $table->unsignedBigInteger('rodovayakniga_id');

            $table->foreign('birth_id')->references('id')->on('births');
            $table->foreign('generations_id')->references('id')->on('generations');
            $table->foreign('father_id')->references('id')->on('fathers');
            $table->foreign('mother_id')->references('id')->on('mothers');
            $table->foreign('brothers_or_sisters_id')->references('id')->on('brothers_or_sisters');
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
