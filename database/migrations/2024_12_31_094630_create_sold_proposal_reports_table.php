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
        Schema::create('sold_proposal_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposal_id');
            $table->string('proposal_name');
            $table->boolean('feasibility_approval')->default(false);
            $table->boolean('finance_availability')->default(false);
            $table->boolean('customer_sign_on_quotation')->default(false);
            $table->boolean('material_sent')->default(false);
            $table->boolean('material_installed')->default(false);
            $table->boolean('customer_agreement')->default(false);
            $table->boolean('sign_mail_paperwork')->default(false);
            $table->boolean('zone_ae_sign')->default(false);
            $table->date('meter_mapping_payment_date')->nullable();
            $table->boolean('meter_installed')->default(false);
            $table->string('inspection_status')->default('not okay'); // Values: 'okay', 'not okay'
            $table->boolean('project_commissioned')->default(false);
            $table->boolean('subsidy_requested')->default(false);
            $table->string('subsidy_claimed')->default('not done'); // Values: 'done', 'not done'
            $table->boolean('subsidy_received_to_client')->default(false);
            $table->decimal('return_of_conversion_of_subsidy', 10, 2)->nullable();

            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_proposal_reports');
    }
};
