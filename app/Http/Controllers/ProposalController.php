<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $proposals = Proposal::all(); 
        
        return view('proposals.index', compact('proposals'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $contacts = Contact::select('id', 'person_name', 'phone')->get();
    return view('proposals.create', compact('contacts'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            // General Information Validation
            'contact_name' => 'required|string',
            'proposal_name' => 'required|string',
            'location' => 'required|string',
            'project_size' => 'required|numeric',
            'project_type' => 'required|string',
            'project_class' => 'required|string',
            'mounting' => 'required|string',
            'tariff_rate' => 'required|numeric',
            'discom' => 'nullable|string',
            'module_type' => 'required|string',
            'array_type' => 'required|string',
            'losses' => 'required|numeric',
            'tilt_angle' => 'required|numeric',
            'azimuth' => 'required|integer',

            // Pricing Validation
            'project_basic_cost' => 'required|numeric',
            'tax_inclusive' => 'required|boolean',
            'tax_percentage' => 'nullable|numeric',
            'state_subsidy' => 'required|boolean',
            'state_subsidy_amount' => 'nullable|numeric',
            'central_subsidy' => 'required|boolean',
            'central_subsidy_amount' => 'nullable|numeric',
            'discom_charges_included' => 'required|boolean',
            'discom_charges_cost' => 'nullable|numeric',
            'elevated_structure' => 'required|boolean',
            'elevated_structure_cost' => 'nullable|numeric',

            // BOM Validation
            'modules' => 'nullable|array',
            'inverters' => 'nullable|array',
            'cables' => 'nullable|array',
            'structures' => 'nullable|array',
            'bos' => 'nullable|array',
            'batteries' => 'nullable|array',
            'warranty_details' => 'nullable|array',

            // Finalization Validation
            'valid_till' => 'required|date',
            'display_generation_data' => 'required|boolean',
            'system_cost' => 'required|numeric',
            'total_project_cost' => 'required|numeric',
            'payment_terms' => 'nullable|array',
            'terms_and_conditions' => 'nullable|array',
        ]);
        $data['created_by']=Auth::user()->name ;
       
        Proposal::create($data);

        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully!');
    }
    public function updateStatus(Request $request)
{
    Log::info('Request data: ', $request->all());

    $request->validate([
        'id' => 'required|exists:proposals,id',
        'status' => 'required|in:Proposed,Discussion,Sold',
    ]);

    $proposal = Proposal::find($request->id);
    $proposal->status = $request->status;
    $proposal->save();

    return response()->json(['message' => 'Proposal status updated successfully!']);
}

    // Pipeline view
    public function pipeline()
    {
        $proposals = Proposal::all();
        return view('pipeline.pip', compact('proposals'));
    }
    public function duplicate($id)
    {
        // Find the proposal by ID
        $proposal = Proposal::findOrFail($id);
    
        // Create a new proposal by copying the old proposal data
        $newProposalData = $proposal->toArray();
    
        // Modify fields like proposal name, if necessary
        $newProposalData['proposal_name'] = $proposal->proposal_name . ' (Duplicate)';
        $newProposalData['created_by'] = Auth::user()->name;
    
        // Create the duplicated proposal
        Proposal::create($newProposalData);
    
        // Redirect with success message
        return redirect()->route('proposals.index')->with('success', 'Proposal duplicated successfully!');
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
        // Find the proposal by ID
        $proposal = Proposal::findOrFail($id);
    
        // Decode JSON fields to arrays if they are strings, or set to empty arrays if null
        $modules = is_string($proposal->modules) ? json_decode($proposal->modules, true) : ($proposal->modules ?? []);
        $inverters = is_string($proposal->inverters) ? json_decode($proposal->inverters, true) : ($proposal->inverters ?? []);
        $cables = is_string($proposal->cables) ? json_decode($proposal->cables, true) : ($proposal->cables ?? []);
        $structures = is_string($proposal->structures) ? json_decode($proposal->structures, true) : ($proposal->structures ?? []);
        $bos = is_string($proposal->bos) ? json_decode($proposal->bos, true) : ($proposal->bos ?? []);
        $batteries = is_string($proposal->batteries) ? json_decode($proposal->batteries, true) : ($proposal->batteries ?? []);
        $warranty_details = is_string($proposal->warranty_details) ? json_decode($proposal->warranty_details, true) : ($proposal->warranty_details ?? []);
    
        // Ensure all arrays are initialized properly if they are null
        $modules = is_array($modules) ? $modules : ['item' => [], 'quantity' => []];
        $inverters = is_array($inverters) ? $inverters : ['item' => [], 'quantity' => []];
        $cables = is_array($cables) ? $cables : ['item' => [], 'quantity' => []];
        $structures = is_array($structures) ? $structures : ['item' => [], 'quantity' => []];
        $bos = is_array($bos) ? $bos : ['item' => [], 'quantity' => []];
        $batteries = is_array($batteries) ? $batteries : ['item' => [], 'quantity' => []];
        $warranty_details = is_array($warranty_details) ? $warranty_details : [];
    
        // Return the edit view with all data
        return view('proposals.edit', compact('proposal', 'modules', 'inverters', 'cables', 'structures', 'bos', 'batteries', 'warranty_details'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            // General Information Validation
            'contact_name' => 'required|string',
            'proposal_name' => 'required|string',
            'location' => 'required|string',
            'project_size' => 'required|numeric',
            'project_type' => 'required|string',
            'project_class' => 'required|string',
            'mounting' => 'required|string',
            'tariff_rate' => 'required|numeric',
            'discom' => 'nullable|string',
            'module_type' => 'required|string',
            'array_type' => 'required|string',
            'losses' => 'required|numeric',
            'tilt_angle' => 'required|numeric',
            'azimuth' => 'required|integer',
    
            // Pricing Validation
            'project_basic_cost' => 'required|numeric',
            'tax_inclusive' => 'required|boolean',
            'tax_percentage' => 'nullable|numeric',
            'state_subsidy' => 'required|boolean',
            'state_subsidy_amount' => 'nullable|numeric',
            'central_subsidy' => 'required|boolean',
            'central_subsidy_amount' => 'nullable|numeric',
            'discom_charges_included' => 'required|boolean',
            'discom_charges_cost' => 'nullable|numeric',
            'elevated_structure' => 'required|boolean',
            'elevated_structure_cost' => 'nullable|numeric',
    
            // BOM Validation
            'modules' => 'nullable|array',
            'inverters' => 'nullable|array',
            'cables' => 'nullable|array',
            'structures' => 'nullable|array',
            'bos' => 'nullable|array',
            'batteries' => 'nullable|array',
            'warranty_details' => 'nullable|array',
    
            // Finalization Validation
            'valid_till' => 'required|date',
            'display_generation_data' => 'required|boolean',
            'system_cost' => 'required|numeric',
            'total_project_cost' => 'required|numeric',
            'payment_terms' => 'nullable|array',
            'terms_and_conditions' => 'nullable|array',
        ]);
    
        $data['created_by'] = Auth::user()->name;
        $proposal = Proposal::findOrFail($id); $proposal->update($data); 
         return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $proposal=Proposal::findOrFail($id);
        $proposal->delete();
        return  redirect()->route('proposals.index')->with('success','Proposal deleted successfully');

    }
}
