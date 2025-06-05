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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('whmcs_id')->nullable();
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->date('date_paid')->nullable();
            $table->string('payment_method');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('status')->default('unpaid'); // unpaid, paid, cancelled
            $table->decimal('discount', 10, 2);
            $table->string('discount_type')->default('percentage'); // percentage, fixed
            $table->decimal('tax_amount', 10, 2);
            $table->decimal('sub_total_amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->string('pdf_path')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
