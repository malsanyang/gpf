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
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->string('case_number');
            $table->string('crime_type');
            $table->string('location');
            $table->longText('description');
            $table->string('status')->nullable()->default('Pending');
            $table->integer('reported_by');
            $table->string('witnessed_by');
            $table->integer('criminal_id');
            $table->integer('police_officer_id');
            $table->longText('investigation_report')->nullable();
            $table->longText('prosecution_report')->nullable();
            $table->integer('investigator_id')->nullable();
            $table->integer('prosecutor_id')->nullable();
            $table->integer('police_station_id')->nullable();
            $table->integer('prison_id')->nullable();
            $table->integer('court_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crimes');
    }
};
