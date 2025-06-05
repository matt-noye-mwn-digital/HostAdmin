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
        Schema::create('settings_company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('main_email_address');
            $table->string('main_telephone_number')->nullable();
            $table->string('website_url')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('address_line_one');
            $table->string('address_line_two')->nullable();
            $table->string('city');
            $table->string('county_state');
            $table->string('zip_postcode');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings_company_details');
    }
};
