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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('domain_name')->unique();
            $table->string('registrar')->default('20i');
            $table->string('status')->default('active');
            $table->date('registration_date');
            $table->date('expiry_date');
            $table->date('renewal_date')->nullable();
            $table->boolean('auto_renew')->default(false);
            $table->decimal('price', 10, 2);
            $table->string('nameserver1')->nullable();
            $table->string('nameserver2')->nullable();
            $table->string('nameserver3')->nullable();
            $table->string('nameserver4')->nullable();
            $table->json('dns_records')->nullable();
            $table->json('settings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
