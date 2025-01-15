@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Proposal Form</h4>

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Proposal Form</h5>
                        <small class="text-muted float-end"> Form</small>
                    </div>
                    <div class="card-body">
                        <form id="multiStepForm" action="{{ route('proposals.update', ['proposal' => $proposal->id]) }}"
                            method="POST"> @csrf
                            @method('PUT')

                            <!-- Step 1: General Information -->
                            <div class="step" id="step-1">
                                <h5 class="mb-3">Step 1: General Information</h5>

                                <div class="row">
                                    <!-- Contact Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="contact_name" class="form-label">Contact Name</label>
                                        <input type="text" class="form-control form-control-sm" id="contact_name"
                                            name="contact_name" value="{{ $proposal->contact_name }}" required />
                                    </div>

                                    <!-- Proposal Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="proposal_name" class="form-label">Proposal Name</label>
                                        <input type="text" class="form-control form-control-sm" id="proposal_name"
                                            name="proposal_name" value="{{ $proposal->proposal_name }}" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Location -->
                                    <div class="col-md-3 mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control form-control-sm" id="location"
                                            name="location" value="{{ $proposal->location }}" required />
                                    </div>

                                    <!-- Project Size -->
                                    <div class="col-md-3 mb-3">
                                        <label for="project_size" class="form-label">Project Size (kW)</label>
                                        <input type="number" step="0.01" class="form-control form-control-sm"
                                            id="project_size" name="project_size" value="{{ $proposal->project_size }}"
                                            required />
                                    </div>

                                    <!-- Project Type -->
                                    <div class="col-md-3 mb-3">
                                        <label for="project_type" class="form-label">Project Type</label>
                                        <select class="form-control form-control-sm" id="project_type" name="project_type"
                                            required>
                                            <option value="" {{ $proposal->project_type == '' ? 'selected' : '' }}>
                                                Select Project Type</option>
                                            <option value="Residential"
                                                {{ $proposal->project_type == 'Residential' ? 'selected' : '' }}>Residential
                                            </option>
                                            <option value="Commercial"
                                                {{ $proposal->project_type == 'Commercial' ? 'selected' : '' }}>Commercial
                                            </option>
                                            <option value="Industrial"
                                                {{ $proposal->project_type == 'Industrial' ? 'selected' : '' }}>Industrial
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Project Class -->
                                    <div class="col-md-3 mb-3">
                                        <label for="project_class" class="form-label">Project Class</label>
                                        <select class="form-control form-control-sm" id="project_class" name="project_class"
                                            required>
                                            <option value="" {{ $proposal->project_class == '' ? 'selected' : '' }}>
                                                Select Project Class</option>
                                            <option value="A" {{ $proposal->project_class == 'A' ? 'selected' : '' }}>
                                                Class A</option>
                                            <option value="B" {{ $proposal->project_class == 'B' ? 'selected' : '' }}>
                                                Class B</option>
                                            <option value="C" {{ $proposal->project_class == 'C' ? 'selected' : '' }}>
                                                Class C</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Mounting -->
                                    <div class="col-md-3 mb-3">
                                        <label for="mounting" class="form-label">Mounting Type</label>
                                        <select class="form-control form-control-sm" id="mounting" name="mounting"
                                            required>
                                            <option value="" {{ $proposal->mounting == '' ? 'selected' : '' }}>Select
                                                Mounting Type</option>
                                            <option value="Rooftop"
                                                {{ $proposal->mounting == 'Rooftop' ? 'selected' : '' }}>Rooftop</option>
                                            <option value="Ground-mounted"
                                                {{ $proposal->mounting == 'Ground-mounted' ? 'selected' : '' }}>
                                                Ground-mounted</option>
                                        </select>
                                    </div>

                                    <!-- Tariff Rate -->
                                    <div class="col-md-3 mb-3">
                                        <label for="tariff_rate" class="form-label">Tariff Rate (₹/kWh)</label>
                                        <input type="number" step="0.01" class="form-control form-control-sm"
                                            id="tariff_rate" name="tariff_rate" value="{{ $proposal->tariff_rate }}"
                                            required />
                                    </div>

                                    <!-- DISCOM -->
                                    <div class="col-md-3 mb-3">
                                        <label for="discom" class="form-label">DISCOM</label>
                                        <input type="text" class="form-control form-control-sm" id="discom"
                                            name="discom" value="{{ $proposal->discom }}" />
                                    </div>
                                </div>

                                <p class="demo-inline-spacing">
                                    <button class="btn btn-outline-primary me-1" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Show more Option
                                    </button>
                                </p>

                                <div class="collapse" id="collapseExample">
                                    <div class="d-grid d-sm-flex p-3 border">
                                        <div class="row">
                                            <!-- Module Type -->
                                            <div class="col-md-5 mb-3">
                                                <label for="module_type" class="form-label">Module Type</label>
                                                <select class="form-control form-control-sm" id="module_type"
                                                    name="module_type" required>
                                                    <option value=""
                                                        {{ $proposal->module_type == '' ? 'selected' : '' }}>Select Module
                                                        Type</option>
                                                    <option value="Rooftop"
                                                        {{ $proposal->module_type == 'Rooftop' ? 'selected' : '' }}>Rooftop
                                                    </option>
                                                    <option value="Ground-mounted"
                                                        {{ $proposal->module_type == 'Ground-mounted' ? 'selected' : '' }}>
                                                        Ground-mounted</option>
                                                </select>
                                            </div>

                                            <!-- Array Type -->
                                            <div class="col-md-5 mb-3">
                                                <label for="array_type" class="form-label">Array Type</label>
                                                <select class="form-control form-control-sm" id="array_type"
                                                    name="array_type" required>
                                                    <option value=""
                                                        {{ $proposal->array_type == '' ? 'selected' : '' }}>Select Array
                                                        Type</option>
                                                    <option value="Fixed-Roof"
                                                        {{ $proposal->array_type == 'Fixed-Roof' ? 'selected' : '' }}>Fixed
                                                        - Roof Mounted</option>
                                                    <option value="Fixed-Open"
                                                        {{ $proposal->array_type == 'Fixed-Open' ? 'selected' : '' }}>Fixed
                                                        - Open Rack</option>
                                                    <option value="1-Axis"
                                                        {{ $proposal->array_type == '1-Axis' ? 'selected' : '' }}>1-Axis
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Losses -->
                                            <div class="col-md-5 mb-3">
                                                <label for="losses" class="form-label">Losses (%)</label>
                                                <input type="number" step="0.01" class="form-control form-control-sm"
                                                    id="losses" name="losses" value="{{ $proposal->losses }}"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Tilt Angle -->
                                            <div class="col-md-5 mb-3">
                                                <label for="tilt_angle" class="form-label">Tilt Angle (°)</label>
                                                <input type="number" step="0.01" class="form-control form-control-sm"
                                                    id="tilt_angle" name="tilt_angle"
                                                    value="{{ $proposal->tilt_angle }}" required />
                                            </div>

                                            <!-- Azimuth -->
                                            <div class="col-md-5 mb-3">
                                                <label for="azimuth" class="form-label">Azimuth (°)</label>
                                                <input type="number" class="form-control form-control-sm" id="azimuth"
                                                    name="azimuth" value="{{ $proposal->azimuth }}" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary btn-sm next-step">Next</button>
                            </div>


                            <!-- Additional Fields -->

                            <div class="step d-none" id="step-2">
                                <h5 class="mb-3">Step 2: Pricing</h5>
                                <div class="col-md-6 mb-3">
                                    <label for="project_basic_cost" class="form-label">Project Basic Cost (₹)</label>
                                    <input type="number" step="0.01" class="form-control" id="project_basic_cost"
                                        name="project_basic_cost" value="{{ $proposal->project_basic_cost }}" required />
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="tax_inclusive" class="form-label">Tax Inclusive?</label>
                                        <select class="form-control" id="tax_inclusive" name="tax_inclusive" required>
                                            <option value="">Select</option>
                                            <option value="1"
                                                {{ $proposal->tax_inclusive == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0"
                                                {{ $proposal->tax_inclusive == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="tax_percentage" class="form-label">Tax Percentage (%)</label>
                                        <input type="number" step="0.01" class="form-control" id="tax_percentage"
                                            name="tax_percentage" value="{{ $proposal->tax_percentage }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="state_subsidy" class="form-label">State Subsidy Available?</label>
                                        <select class="form-control" id="state_subsidy" name="state_subsidy" required>
                                            <option value="">Select</option>
                                            <option value="1"
                                                {{ $proposal->state_subsidy == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0"
                                                {{ $proposal->state_subsidy == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="state_subsidy_amount" class="form-label">State Subsidy Amount
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="state_subsidy_amount" name="state_subsidy_amount"
                                            value="{{ $proposal->state_subsidy_amount }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="central_subsidy" class="form-label">Central Subsidy Available?</label>
                                        <select class="form-control" id="central_subsidy" name="central_subsidy"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1"
                                                {{ $proposal->central_subsidy == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0"
                                                {{ $proposal->central_subsidy == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="central_subsidy_amount" class="form-label">Central Subsidy Amount
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="central_subsidy_amount" name="central_subsidy_amount"
                                            value="{{ $proposal->central_subsidy_amount }}" />
                                    </div>
                                </div>
                                <h6>Other Costs?</h6>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="discom_charges_included" class="form-label">DISCOM Charges
                                            Included?</label>
                                        <select class="form-control" id="discom_charges_included"
                                            name="discom_charges_included" required>
                                            <option value="">Select</option>
                                            <option value="1"
                                                {{ $proposal->discom_charges_included == '1' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0"
                                                {{ $proposal->discom_charges_included == '0' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="discom_charges_cost" class="form-label">DISCOM Charges Cost
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="discom_charges_cost" name="discom_charges_cost"
                                            value="{{ $proposal->discom_charges_cost }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="elevated_structure" class="form-label">Elevated Structure
                                            Required?</label>
                                        <select class="form-control" id="elevated_structure" name="elevated_structure"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1"
                                                {{ $proposal->elevated_structure == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0"
                                                {{ $proposal->elevated_structure == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="elevated_structure_cost" class="form-label">Elevated Structure Cost
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="elevated_structure_cost" name="elevated_structure_cost"
                                            value="{{ $proposal->elevated_structure_cost }}" />
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>



                            <!-- Step 3: BOM -->
                            <div class="step d-none" id="step-3">
                                <h5 class="mb-3">Step 3: BOM</h5>
                                <div class="row">
                                    <!-- Left Side -->
                                    <div class="col-md-6">
                                        <h6>Modules / Solar Panels</h6>
                                        <div id="modules">
                                            <h3>Modules</h3>
                                            @foreach ($modules['item'] ?? [] as $key => $module)
                                                <div style="display: flex; align-items: center; gap: 5px;">
                                                    <input type="text" name="modules[item][]"
                                                        value="{{ $module }}" placeholder="Enter Module Item"
                                                        style="width: 150px;">
                                                    <input type="number" name="modules[quantity][]"
                                                        value="{{ $modules['quantity'][$key] ?? '' }}"
                                                        placeholder="Enter Quantity" style="width: 100px;">
                                                    <button type="button" onclick="removeElement(this)"
                                                        style="flex-shrink: 0;">Remove</button>
                                                </div>
                                            @endforeach
                                            <a class="btn rounded-pill btn-link" onclick="addModule()" type="button-link"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Module
                                            </a>
                                        </div>

                                        <h6>Inverter</h6>
                                        <div id="inverters">
                                            <h3>Inverters</h3>
                                            @foreach ($inverters['item'] ?? [] as $key => $inverter)
                                                <div style="display: flex; align-items: center; gap: 5px;">
                                                    <input type="text" name="inverters[item][]"
                                                        value="{{ $inverter }}" placeholder="Enter Inverter Item"
                                                        style="width: 150px;">
                                                    <input type="number" name="inverters[quantity][]"
                                                        value="{{ $inverters['quantity'][$key] ?? '' }}"
                                                        placeholder="Enter Quantity" style="width: 100px;">
                                                    <button type="button" onclick="removeElement(this)"
                                                        style="flex-shrink: 0;">Remove</button>
                                                </div>
                                            @endforeach
                                            <a class="btn rounded-pill btn-link" onclick="addInverter()"
                                                type="button-link" style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Inverter
                                            </a>
                                        </div>

                                        <h6>Cables</h6>
                                        <div id="cables">
                                            <h3>Cables</h3>
                                            @foreach ($cables['item'] ?? [] as $key => $cable)
                                                <div style="display: flex; align-items: center; gap: 5px;">
                                                    <input type="text" name="cables[item][]"
                                                        value="{{ $cable }}" placeholder="Enter Cable Item"
                                                        style="width: 150px;">
                                                    <input type="number" name="cables[quantity][]"
                                                        value="{{ $cables['quantity'][$key] ?? '' }}"
                                                        placeholder="Enter Quantity" style="width: 100px;">
                                                    <button type="button" onclick="removeElement(this)"
                                                        style="flex-shrink: 0;">Remove</button>
                                                </div>
                                            @endforeach
                                            <a class="btn rounded-pill btn-link" onclick="addCable()" type="button-link"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Cable
                                            </a>
                                        </div>

                                        <h6>Structure</h6>
                                        <div id="structures">
                                            <h3>Structures</h3>
                                            @foreach ($structures['item'] ?? [] as $key => $structure)
                                                <div style="display: flex; align-items: center; gap: 5px;">
                                                    <input type="text" name="structures[item][]"
                                                        value="{{ $structure }}" placeholder="Enter Structure Item"
                                                        style="width: 150px;">
                                                    <input type="number" name="structures[quantity][]"
                                                        value="{{ $structures['quantity'][$key] ?? '' }}"
                                                        placeholder="Enter Quantity" style="width: 100px;">
                                                    <button type="button" onclick="removeElement(this)"
                                                        style="flex-shrink: 0;">Remove</button>
                                                </div>
                                            @endforeach
                                            <a class="btn rounded-pill btn-link" onclick="addStructure()"
                                                type="button-link" style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Structure
                                            </a>
                                        </div>

                                        <h6>BOS</h6>
                                        <div id="bos">
                                            <h3>BOS</h3>
                                            @foreach ($bos['item'] ?? [] as $key => $bos_item)
                                                <div style="display: flex; align-items: center; gap: 5px;">
                                                    <input type="text" name="bos[item][]" value="{{ $bos_item }}"
                                                        placeholder="Enter BOS Item" style="width: 150px;">
                                                    <input type="number" name="bos[quantity][]"
                                                        value="{{ $bos['quantity'][$key] ?? '' }}"
                                                        placeholder="Enter Quantity" style="width: 100px;">
                                                    <button type="button" onclick="removeElement(this)"
                                                        style="flex-shrink: 0;">Remove</button>
                                                </div>
                                            @endforeach
                                            <a class="btn rounded-pill btn-link" onclick="addBOS()" type="button-link"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add BOS
                                            </a>
                                        </div>

                                        <h6>Battery</h6>
                                        <div id="batteries">
                                            <h3>Batteries</h3>
                                            @foreach ($batteries['item'] ?? [] as $key => $battery)
                                                <div style="display: flex; align-items: center; gap: 5px;">
                                                    <input type="text" name="batteries[item][]"
                                                        value="{{ $battery }}" placeholder="Enter Battery Item"
                                                        style="width: 150px;">
                                                    <input type="number" name="batteries[quantity][]"
                                                        value="{{ $batteries['quantity'][$key] ?? '' }}"
                                                        placeholder="Enter Quantity" style="width: 100px;">
                                                    <button type="button" onclick="removeElement(this)"
                                                        style="flex-shrink: 0;">Remove</button>
                                                </div>
                                            @endforeach
                                            <a class="btn rounded-pill btn-link" onclick="addBattery()"
                                                type="button-link" style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Battery
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="col-md-6">
                                        <h6>Warranty Details</h6>
                                        <div class="row">
                                            <!-- First Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="system_warranty">System Warranty</label>
                                                <input type="text" name="warranty_details[system_warranty]"
                                                    value="{{ $warranty_details['system_warranty'] ?? '' }}"
                                                    placeholder="Enter System Warranty">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="modules_power">Modules Power</label>
                                                <input type="number" name="warranty_details[modules_power]"
                                                    value="{{ $warranty_details['modules_power'] ?? '' }}"
                                                    placeholder="Enter Modules Power">
                                            </div>

                                            <!-- Second Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="modules_product">Modules Product</label>
                                                <input type="number" name="warranty_details[modules_product]"
                                                    value="{{ $warranty_details['modules_product'] ?? '' }}"
                                                    placeholder="Enter Modules Product">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inverter">Inverter</label>
                                                <input type="number" name="warranty_details[inverter]"
                                                    value="{{ $warranty_details['inverter'] ?? '' }}"
                                                    placeholder="Enter Inverter">
                                            </div>

                                            <!-- Third Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="structure">Structure</label>
                                                <input type="number" name="warranty_details[structure]"
                                                    value="{{ $warranty_details['structure'] ?? '' }}"
                                                    placeholder="Enter Structure">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="bos">BOS</label>
                                                <input type="number" name="warranty_details[bos]"
                                                    value="{{ $warranty_details['bos'] ?? '' }}" placeholder="Enter BOS">
                                            </div>

                                            <!-- Fourth Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="battery">Battery</label>
                                                <input type="number" name="warranty_details[battery]"
                                                    value="{{ $warranty_details['battery'] ?? '' }}"
                                                    placeholder="Enter Battery">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-3">
                                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>





                            <!-- Step 4: Finalization -->
                            <div class="step d-none" id="step-4">
                                <h5 class="mb-4">Step 4: Finalization</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="valid_till" class="form-label">Valid Till:</label>
                                        <input type="date" name="valid_till" id="valid_till" class="form-control"
                                            value="{{ $proposal->valid_till }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="display_generation_data" class="form-label">Display Generation
                                            Data:</label>
                                        <select name="display_generation_data" id="display_generation_data"
                                            class="form-select" required>
                                            <option value="1"
                                                {{ $proposal->display_generation_data == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0"
                                                {{ $proposal->display_generation_data == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="system_cost" class="form-label">System Cost:</label>
                                        <input type="number" name="system_cost" id="system_cost" class="form-control"
                                            step="0.01" value="{{ $proposal->system_cost }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="total_project_cost" class="form-label">Total Project Cost:</label>
                                        <input type="number" name="total_project_cost" id="total_project_cost"
                                            class="form-control" step="0.01"
                                            value="{{ $proposal->total_project_cost }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payment Terms:</label>
                                    <div id="payment_terms">
                                        @php
                                            $payment_terms = is_array($proposal->payment_terms)
                                                ? $proposal->payment_terms
                                                : json_decode($proposal->payment_terms, true);
                                        @endphp
                                        @foreach ($payment_terms as $term)
                                            <div class="input-group mb-2">
                                                <input type="text" name="payment_terms[]"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter a payment term" value="{{ $term }}">
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick="removeElement(this)">Remove</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="addPaymentTerm()">+ Add Payment Term</button>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Terms and Conditions:</label>
                                    <div id="terms_and_conditions">
                                        @php
                                            $terms_and_conditions = is_array($proposal->terms_and_conditions)
                                                ? $proposal->terms_and_conditions
                                                : json_decode($proposal->terms_and_conditions, true);
                                        @endphp
                                        @foreach ($terms_and_conditions as $condition)
                                            <div class="input-group mb-2">
                                                <input type="text" name="terms_and_conditions[]"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter a term or condition" value="{{ $condition }}">
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick="removeElement(this)">Remove</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addTerm()">+
                                        Add
                                        Term</button>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const steps = document.querySelectorAll('.step');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');

            let currentStep = 0;

            const showStep = (index) => {
                steps.forEach((step, idx) => {
                    step.classList.toggle('d-none', idx !== index);
                });
            };

            nextButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            showStep(currentStep); // Initialize the first step
        });

        function addModule() {
            const div = document.createElement('div');
            div.innerHTML = `
    <div style="display: flex; align-items: center; gap: 5px;">
        <input type="text" name="modules[item][]" placeholder="Enter Module Item" style="width: 150px;">
        <input type="number" name="modules[quantity][]" placeholder="Enter Quantity" style="width: 100px;">
        <button type="button" onclick="removeElement(this)" style="flex-shrink: 0;">Remove</button>
    </div>
    `;
            document.getElementById('modules').appendChild(div);
        }

        function addInverter() {
            const div = document.createElement('div');
            div.innerHTML = `
    <div style="display: flex; align-items: center; gap: 5px;">
        <input type="text" name="inverters[item][]" placeholder="Enter Inverter Item" style="width: 150px;">
        <input type="number" name="inverters[quantity][]" placeholder="Enter Quantity" style="width: 100px;">
        <button type="button" onclick="removeElement(this)" style="flex-shrink: 0;">Remove</button>
    </div>
    `;
            document.getElementById('inverters').appendChild(div);
        }

        function addCable() {
            const div = document.createElement('div');
            div.innerHTML = `
    <div style="display: flex; align-items: center; gap: 5px;">
        <input type="text" name="cables[item][]" placeholder="Enter Cable Item" style="width: 150px;">
        <input type="number" name="cables[quantity][]" placeholder="Enter Quantity" style="width: 100px;">
        <button type="button" onclick="removeElement(this)" style="flex-shrink: 0;">Remove</button>
    </div>
    `;
            document.getElementById('cables').appendChild(div);
        }

        function addStructure() {
            const div = document.createElement('div');
            div.innerHTML = `
    <div style="display: flex; align-items: center; gap: 5px;">
        <input type="text" name="structures[item][]" placeholder="Enter Structure Item" style="width: 150px;">
        <input type="number" name="structures[quantity][]" placeholder="Enter Quantity" style="width: 100px;">
        <button type="button" onclick="removeElement(this)" style="flex-shrink: 0;">Remove</button>
    </div>
    `;
            document.getElementById('structures').appendChild(div);
        }

        function addBOS() {
            const div = document.createElement('div');
            div.innerHTML = `
    <div style="display: flex; align-items: center; gap: 5px;">
        <input type="text" name="bos[item][]" placeholder="Enter BOS Item" style="width: 150px;">
        <input type="number" name="bos[quantity][]" placeholder="Enter Quantity" style="width: 100px;">
        <button type="button" onclick="removeElement(this)" style="flex-shrink: 0;">Remove</button>
    </div>
    `;
            document.getElementById('bos').appendChild(div);
        }

        function addBattery() {
            const div = document.createElement('div');
            div.innerHTML = `
    <div style="display: flex; align-items: center; gap: 5px;">
        <input type="text" name="batteries[item][]" placeholder="Enter Battery Item" style="width: 150px;">
        <input type="number" name="batteries[quantity][]" placeholder="Enter Quantity" style="width: 100px;">
        <button type="button" onclick="removeElement(this)" style="flex-shrink: 0;">Remove</button>
    </div>
    `;
            document.getElementById('batteries').appendChild(div);
        }

        // Function to remove dynamically added elements
        function removeElement(button) {
            button.parentElement.remove();
        }

        function addPaymentTerm() {
            const div = document.createElement('div');
            div.innerHTML = `<input type="text" name="payment_terms[]" placeholder="Enter a payment term">
                     <button type="button" onclick="removeElement(this)">Remove</button>`;
            document.getElementById('payment_terms').appendChild(div);
        }

        function addTerm() {
            const div = document.createElement('div');
            div.innerHTML = `<input type="text" name="terms_and_conditions[]" placeholder="Enter a term or condition">
                     <button type="button" onclick="removeElement(this)">Remove</button>`;
            document.getElementById('terms_and_conditions').appendChild(div);
        }

        function removeElement(button) {
            button.parentElement.remove();
        }
    </script>
@endsection
