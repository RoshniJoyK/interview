<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attends', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id')->nullable(false);
            $table->string('result');
            $table->text('details');
            $table->string('expected_salary');
            $table->string('joining_date');
            $table->string('notice_period');
            $table->string('upload_code')->nullable();
            $table->string('upload_interview_paper')->nullable();
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
        Schema::dropIfExists('attends');
    }
};
