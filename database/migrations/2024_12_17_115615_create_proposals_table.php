<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            // General Information
            $table->string('contact_name');
            $table->string('proposal_name');
            $table->string('location');
            $table->decimal('project_size', 8, 2);
            $table->string('project_type');
            $table->string('project_class');
            $table->string('mounting');
            $table->decimal('tariff_rate', 8, 2);
            $table->string('discom')->nullable();
            $table->string('module_type');
            $table->string('array_type');
            $table->decimal('losses', 5, 2);
            $table->decimal('tilt_angle', 5, 2);
            $table->integer('azimuth');

            // Pricing
            $table->decimal('project_basic_cost', 10, 2);
            $table->boolean('tax_inclusive');
            $table->decimal('tax_percentage', 5, 2)->nullable();
            $table->boolean('state_subsidy');
            $table->decimal('state_subsidy_amount', 10, 2)->nullable();
            $table->boolean('central_subsidy');
            $table->decimal('central_subsidy_amount', 10, 2)->nullable();
            $table->boolean('discom_charges_included');
            $table->decimal('discom_charges_cost', 10, 2)->nullable();
            $table->boolean('elevated_structure');
            $table->decimal('elevated_structure_cost', 10, 2)->nullable();

            // BOM (Bill of Materials)
            $table->json('modules')->nullable(); // Stores modules as JSON
            $table->json('inverters')->nullable();
            $table->json('cables')->nullable();
            $table->json('structures')->nullable();
            $table->json('bos')->nullable();
            $table->json('batteries')->nullable();
            $table->json('warranty_details')->nullable();

            // Finalization
            $table->date('valid_till');
            $table->boolean('display_generation_data');
            $table->decimal('system_cost', 10, 2);
            $table->decimal('total_project_cost', 10, 2);
            $table->json('payment_terms')->nullable();
            $table->json('terms_and_conditions')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
