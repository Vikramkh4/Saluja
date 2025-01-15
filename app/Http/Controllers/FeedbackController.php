<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\SoldProposalReport;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $proposals = Proposal::where('status', 'sold')->get();
       
        
        return view('feed.create', compact('proposals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'proposal_name' => 'required|string|max:255',
            'feasibility_approval' => 'nullable|boolean',
            'finance_availability' => 'nullable|boolean',
            'customer_sign_on_quotation' => 'nullable|boolean',
            'material_sent' => 'nullable|boolean',
            'material_installation' => 'nullable|boolean',
            'customer_agreement' => 'nullable|boolean',
            'sin_mail_paperwork' => 'nullable|boolean',
            'zone_sign' => 'nullable|boolean',
            'meter_mapping_payment_date' => 'nullable|date',
            'meter_installation' => 'nullable|boolean',
            'inspection_status' => 'nullable|string|in:okay,not okay',
            'project_commissioned' => 'nullable|boolean',
            'subsidy_requested' => 'nullable|boolean',
            'subsidy_claimed' => 'nullable|string|in:done,not done',
            'subsidy_received_to_client' => 'nullable|boolean',
            'return_of_conversion_subsidy' => 'nullable|boolean',
        ]);
    
        // Save the feedback to the database
        SoldProposalReport::create($validatedData);
    
        // Redirect with success message
        return redirect()->route('feeds.create')->with('success', 'Feedback submitted successfully!');
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
