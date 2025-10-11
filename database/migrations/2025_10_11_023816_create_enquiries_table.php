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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('location');
            $table->string('hear_about_us');
            $table->boolean('receive_insight')->default(false);
            $table->string('budget');
            $table->longText('about_project');
            $table->longText('service_looking_for');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
