<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'contact_name',
        'proposal_name',
        'location',
        'project_size',
        'project_type',
        'project_class',
        'mounting',
        'tariff_rate',
        'discom',
        'module_type',
        'array_type',
        'losses',
        'tilt_angle',
        'azimuth',
        'project_basic_cost',
        'tax_inclusive',
        'tax_percentage',
        'state_subsidy',
        'state_subsidy_amount',
        'central_subsidy',
        'central_subsidy_amount',
        'discom_charges_included',
        'discom_charges_cost',
        'elevated_structure',
        'elevated_structure_cost',
        'modules',
        'inverters',
        'cables',
        'structures',
        'bos',
        'batteries',
        'warranty_details',
        'valid_till',
        'display_generation_data',
        'system_cost',
        'total_project_cost',
        'payment_terms',
        'terms_and_conditions',
        "created_by",
    ];

    protected $casts = [
        'modules' => 'array',
        'inverters' => 'array',
        'cables' => 'array',
        'structures' => 'array',
        'bos' => 'array',
        'batteries' => 'array',
        'warranty_details' => 'array',
        'payment_terms' => 'array',
        'terms_and_conditions' => 'array',
    ];
}
