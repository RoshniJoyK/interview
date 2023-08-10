<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddstaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addstaffs', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id')->unique()->nullable(false);
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
           
            $table->string('offerdetails')->nullable(false);
            $table->string('salary')->nullable(false);
            $table->date('joiningdate')->nullable(false);
            $table->string('uploadcv')->nullable(false);
            $table->string('traingperiod')->nullable(false);
            $table->string('trainingnumberofdays')->nullable();
            
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
        Schema::dropIfExists('addstaffs');
    }
}
