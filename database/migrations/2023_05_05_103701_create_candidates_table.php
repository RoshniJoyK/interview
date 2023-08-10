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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('age')->nullable();
            $table->string('gender')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('phone1')->nullable(false);
            $table->string('phone2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('addr')->nullable();
            $table->string('location')->nullable(false);
            $table->integer('district_id')->nullable(false);
            $table->integer('w_years')->nullable();
            $table->integer('w_months')->nullable();
            $table->string('skills')->nullable(false);
            $table->string('cv')->nullable(false);
            $table->string('photo')->nullable();
            $table->integer('job_id')->nullable(false);
            $table->date('applied_date')->nullable(false);
            $table->string('exp_sal')->nullable();
            $table->string('applied_thru')->nullable(false);
            $table->string('others')->nullable();
            $table->integer('status')->default(0)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
