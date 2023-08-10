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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id')->nullable(false);
            $table->string('round')->nullable(false);
            $table->date('interview_date')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('question')->nullable();
            $table->string('status')->default(0)->nullable(false);
            $table->string('round_result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
