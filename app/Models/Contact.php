<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     use HasFactory;

    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'person_name',
        'company_name',
        'phone',
        'email',
        'remark',
        'gst_treatment',
        'billing_address_line_one',
        'billing_address_line_two',
        'billing_city',
        'billing_state',
        'billing_pincode',
        'billing_country',
        'shipping_address_line_one',
        'shipping_address_line_two',
        'shipping_city',
        'shipping_state',
        'shipping_pincode',
        'shipping_country',
        "created_by",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gst_treatment' => 'string',
    ];
}
