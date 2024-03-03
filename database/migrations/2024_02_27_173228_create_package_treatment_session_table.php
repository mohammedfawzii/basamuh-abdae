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

            Schema::create('package_treatment_session', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('package_id');
                $table->unsignedBigInteger('treatment_session_id');
                $table->integer('quantity')->default(1);
                $table->timestamps();
                $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
                $table->foreign('treatment_session_id')->references('id')->on('treatment_sessions')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_treatment_session');
    }
};
