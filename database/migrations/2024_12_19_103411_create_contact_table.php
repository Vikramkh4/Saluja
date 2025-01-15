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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // Lead or Customer
            $table->enum('type', ['Lead', 'Customer'])->default('Lead');

            // General Information
            $table->string('person_name'); // Person Name
            $table->string('company_name')->nullable(); // Company Name
            $table->string('phone', 15)->nullable(); // Phone
            $table->string('email')->nullable(); // Email
            $table->text('remark')->nullable(); // Remark

            // GST Treatment
            $table->enum('gst_treatment', ['Consumer', 'Registered', 'Unregistered'])->default('Consumer');

            // Billing Address
            $table->string('billing_address_line_one')->nullable();
            $table->string('billing_address_line_two')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_pincode', 10)->nullable();
            $table->string('billing_country')->nullable();

            // Shipping Address
            $table->string('shipping_address_line_one')->nullable();
            $table->string('shipping_address_line_two')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_pincode', 10)->nullable();
            $table->string('shipping_country')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
