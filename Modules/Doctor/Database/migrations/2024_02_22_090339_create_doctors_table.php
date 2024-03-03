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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->enum('military_service_status', ['Completed', 'Deferred', 'Exempted', 'Ongoing'])->default('Ongoing')->nullable();
            $table->string('qualification')->nullable();
            $table->string('nationalityID')->nullable();
            $table->string('qualification_degree')->nullable();
            $table->enum('sex_status', ['male', 'female'])->default('male')->nullable();
            $table->enum('marital_status', ['married', 'Single'])->default('married')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('medical_specialty_id')->constrained('medical_specialties')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
