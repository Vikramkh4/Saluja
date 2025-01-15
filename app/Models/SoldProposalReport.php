<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProposalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'proposal_name',
        'feasibility_approval',
        'finance_availability',
        'customer_sign_on_quotation',
        'material_sent',
        'material_installed',
        'customer_agreement',
        'sign_mail_paperwork',
        'zone_ae_sign',
        'meter_mapping_payment_date',
        'meter_installed',
        'inspection_status',
        'project_commissioned',
        'subsidy_requested',
        'subsidy_claimed',
        'subsidy_received_to_client',
        'return_of_conversion_of_subsidy',
    ];

    // Relationship with Proposal model
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
