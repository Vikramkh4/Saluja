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
                        <form id="multiStepForm" action="{{ route('proposals.store') }}" method="POST">
                            @csrf

                            <!-- Step 1: General Information -->
                            <div class="step" id="step-1">
                                <h5 class="mb-3">Step 1: General Information</h5>

                                <div class="row">
                                    <!-- Contact Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="contact_name" class="form-label">Contact Number</label>
                                        <select class="form-select form-select-sm" id="contact_name" name="contact_name"
                                            required>
                                            <option value="" disabled selected>Select a Contact</option>
                                            @foreach ($contacts as $contact)
                                                <option value="{{ $contact->phone }}" data-phone="{{ $contact->phone }}"
                                                    data-name="{{ $contact->person_name }}">
                                                    {{ $contact->person_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Proposal Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="proposal_name" class="form-label">Proposal Name</label>
                                        <input type="text" class="form-control form-control-sm" id="proposal_name"
                                            name="proposal_name" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Location -->
                                    <div class="col-md-3 mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control form-control-sm" id="location"
                                            name="location" required />
                                    </div>

                                    <!-- Project Size -->
                                    <div class="col-md-3 mb-3">
                                        <label for="project_size" class="form-label">Project Size (kW)</label>
                                        <input type="number" step="0.01" class="form-control form-control-sm"
                                            id="project_size" name="project_size" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="project_type" class="form-label">Project Type</label>
                                        <select class="form-control form-control-sm" id="project_type" name="project_type"
                                            required>
                                            <option value="">Select Project Type</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Industrial">Industrial</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="project_class" class="form-label">Project Class</label>
                                        <select class="form-control form-control-sm" id="project_class" name="project_class"
                                            required>
                                            <option value="">Select Project Class</option>
                                            <option value="A">Class A</option>
                                            <option value="B">Class B</option>
                                            <option value="C">Class C</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <!-- Mounting -->
                                    <div class="col-md-3 mb-3">
                                        <label for="mounting" class="form-label">Mounting Type</label>
                                        <select class="form-control form-control-sm" id="mounting" name="mounting"
                                            required>
                                            <option value="">Select Mounting Type</option>
                                            <option value="Rooftop">Rooftop</option>
                                            <option value="Ground-mounted">Ground-mounted</option>
                                        </select>
                                    </div>

                                    <!-- Tariff Rate -->
                                    <div class="col-md-3 mb-3">
                                        <label for="tariff_rate" class="form-label">Tariff Rate (₹/kWh)</label>
                                        <input type="number" step="0.01" class="form-control form-control-sm"
                                            id="tariff_rate" name="tariff_rate" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="discom" class="form-label">DISCOM</label>
                                        <input type="text" class="form-control form-control-sm" id="discom"
                                            name="discom" />
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
                                            <!-- Array Type -->


                                            <div class="col-md-5 mb-3">
                                                <label for="module_type" class="form-label">Module Type</label>
                                                <select class="form-control form-control-sm" id="module_type"
                                                    name="module_type" required>
                                                    <option value="">Select Module Type</option>
                                                    <option value="Rooftop">Rooftop</option>
                                                    <option value="Ground-mounted">Ground-mounted</option>
                                                </select>

                                            </div>


                                            <div class="col-md-5 mb-3">
                                                <label for="array_type" class="form-label">Array Type</label>
                                                <select class="form-control form-control-sm" id="array_type"
                                                    name="array_type" required>
                                                    <option value="">Select Array Type</option>
                                                    <option value="Fixed-Roof">Fixed - Roof Mounted</option>
                                                    <option value="Fixed-Open">Fixed - Open Rack</option>
                                                    <option value="1-Axis">1-Axis</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label for="losses" class="form-label">Losses (%)</label>
                                                <input type="number" step="0.01"
                                                    value="14"class="form-control form-control-sm" id="losses"
                                                    name="losses" required />
                                            </div>
                                        </div>
                                        <!-- Losses -->
                                        <div class="row">
                                            <!-- Tilt Angle -->
                                            <div class="col-md-5 mb-3">
                                                <label for="tilt_angle" class="form-label">Tilt Angle (°)</label>
                                                <input type="number" step="0.01"
                                                    value="22"class="form-control form-control-sm" id="tilt_angle"
                                                    name="tilt_angle" required />
                                            </div>

                                            <!-- Azimuth -->
                                            <div class="col-md-5 mb-3">
                                                <label for="azimuth" class="form-label">Azimuth (°)</label>
                                                <input type="number" value="180" class="form-control form-control-sm"
                                                    id="azimuth" name="azimuth" required />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Project Type -->


                                <!-- Project Class -->
                                <button type="button" class="btn btn-primary btn-sm next-step">Next</button>

                            </div>

                            <!-- Additional Fields -->

                            <div class="step d-none" id="step-2">
                                <h5 class="mb-3">Step 2: Pricing</h5>
                                <div class="col-md-6 mb-3">
                                    <label for="project_basic_cost" class="form-label">Project Basic Cost (₹)</label>
                                    <input type="number" step="0.01" class="form-control" id="project_basic_cost"
                                        name="project_basic_cost" required />
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="tax_inclusive" class="form-label">Tax Inclusive?</label>
                                        <select class="form-control" id="tax_inclusive" name="tax_inclusive" required>
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <!-- Tax Percentage -->
                                    <div class="col-md-3 mb-3">
                                        <label for="tax_percentage" class="form-label">Tax Percentage (%)</label>
                                        <input type="number" step="0.01" class="form-control" id="tax_percentage"
                                            name="tax_percentage" />
                                    </div>
                                </div>
                                <!-- Tax Inclusive -->
                                <div class="row">
                                    <div class=" col-md-3 mb-3">
                                        <label for="state_subsidy" class="form-label">State Subsidy Available?</label>
                                        <select class="form-control" id="state_subsidy" name="state_subsidy" required>
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <!-- State Subsidy Amount -->
                                    <div class=" col-md-3 mb-3">
                                        <label for="state_subsidy_amount" class="form-label">State Subsidy Amount
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="state_subsidy_amount" name="state_subsidy_amount" />
                                    </div>
                                </div>

                                <!-- State Subsidy -->


                                <!-- Central Subsidy -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="central_subsidy" class="form-label">Central Subsidy Available?</label>
                                        <select class="form-control" id="central_subsidy" name="central_subsidy"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <!-- Central Subsidy Amount -->
                                    <div class="col-md-3 mb-3">
                                        <label for="central_subsidy_amount" class="form-label">Central Subsidy Amount
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="central_subsidy_amount" name="central_subsidy_amount" />
                                    </div>
                                </div>
                                <h6>Other Costs?</h6>
                                <div class="row">
                                    <!-- DISCOM Charges Included -->
                                    <div class="col-md-3 mb-3">
                                        <label for="discom_charges_included" class="form-label">DISCOM Charges
                                            Included?</label>
                                        <select class="form-control" id="discom_charges_included"
                                            name="discom_charges_included" required>
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <!-- DISCOM Charges Cost -->
                                    <div class=" col-md-3 mb-3">
                                        <label for="discom_charges_cost" class="form-label">DISCOM Charges Cost
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="discom_charges_cost" name="discom_charges_cost" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="elevated_structure" class="form-label">Elevated Structure
                                            Required?</label>
                                        <select class="form-control" id="elevated_structure" name="elevated_structure"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <!-- Elevated Structure Cost -->
                                    <div class="col-md-3 mb-3">
                                        <label for="elevated_structure_cost" class="form-label">Elevated Structure Cost
                                            (₹)</label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="elevated_structure_cost" name="elevated_structure_cost" />
                                    </div>
                                </div>

                                <!-- Elevated Structure -->

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
                                            <a class="btn rounded-pill btn-link" onclick="addModule()"type="button-link"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Module</a>
                                        </div>

                                        <h6>Inverter</h6>
                                        <div id="inverters">
                                            <a class="btn rounded-pill btn-link" type="button" onclick="addInverter()"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Inverter</a>

                                        </div>

                                        <h6>Cables</h6>
                                        <div id="cables">
                                            <a class="btn rounded-pill btn-link" type="button" onclick="addCable()"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Cable</a>

                                        </div>

                                        <h6>Structure</h6>
                                        <div id="structures">
                                            <a class="btn rounded-pill btn-link" type="button" onclick="addStructure()"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Structure</a>

                                        </div>

                                        <h6>BOS</h6>
                                        <div id="bos">
                                            <a class="btn rounded-pill btn-link" type="button" onclick="addBOS()"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add BOS</a>

                                        </div>

                                        <h6>Battery</h6>
                                        <div id="batteries">
                                            <a class="btn rounded-pill btn-link" type="button" onclick="addBattery()"
                                                style="color: rgba(86, 86, 231, 0.774)">
                                                + Add Battery</a>

                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="col-md-6">
                                        <h6>Warranty Details</h6>
                                        <div class="row">
                                            <!-- First Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="system_warranty">System Warranty</label>
                                                <input type="text" id="system_warranty"
                                                    name="warranty_details[system_warranty]"
                                                    placeholder="Enter Warranty Details">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="modules_power">Modules - Power</label>
                                                <input type="text" id="modules_power"
                                                    name="warranty_details[modules_power]" placeholder="As per OEM">
                                            </div>

                                            <!-- Second Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="modules_product">Modules - Product</label>
                                                <input type="text" id="modules_product"
                                                    name="warranty_details[modules_product]" placeholder="As per OEM">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inverter">Inverter</label>
                                                <input type="text" id="inverter" name="warranty_details[inverter]"
                                                    placeholder="As per OEM">
                                            </div>

                                            <!-- Third Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="structure">Structure</label>
                                                <input type="text" id="structure" name="warranty_details[structure]"
                                                    placeholder="As per OEM">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="bos">BOS</label>
                                                <input type="text" id="bos" name="warranty_details[bos]"
                                                    placeholder="As per OEM">
                                            </div>

                                            <!-- Fourth Row -->
                                            <div class="col-md-6 mb-3">
                                                <label for="battery">Battery</label>
                                                <input type="text" id="battery" name="warranty_details[battery]"
                                                    placeholder="As per OEM">
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
                                            required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="display_generation_data" class="form-label">Display Generation
                                            Data:</label>
                                        <select name="display_generation_data" id="display_generation_data"
                                            class="form-select" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="system_cost" class="form-label">System Cost:</label>
                                        <input type="number" name="system_cost" id="system_cost" class="form-control"
                                            step="0.01" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="total_project_cost" class="form-label">Total Project Cost:</label>
                                        <input type="number" name="total_project_cost" id="total_project_cost"
                                            class="form-control" step="0.01" required>
                                    </div>
                                </div>


                                <div class="mb-3"> <label class="form-label">Payment Terms:</label>
                                    <div id="payment_terms">
                                        <div class="input-group mb-2"> <input type="text" name="payment_terms[]"
                                                class="form-control form-control-sm" placeholder="Enter a payment term"
                                                value="Advance at booking - 50%"> <button type="button"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button> </div>
                                        <div class="input-group mb-2"> <input type="text" name="payment_terms[]"
                                                class="form-control form-control-sm" placeholder="Enter a payment term"
                                                value="Before material dispatch - 40%"> <button type="button"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button> </div>
                                        <div class="input-group mb-2"> <input type="text" name="payment_terms[]"
                                                class="form-control form-control-sm" placeholder="Enter a payment term"
                                                value="After installation & commissioning - 10%"> <button type="button"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button> </div>
                                    </div> <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="addPaymentTerm()">+ Add Payment Term</button>
                                </div>
                                <div class="mb-3"> <label class="form-label">Terms and Conditions:</label>
                                    <div id="terms_and_conditions">
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Prices quoted are valid till proposal validity."> <button
                                                type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button> </div>
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Offer Price may vary after detailed site survey or with change in site conditions.">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button>
                                        </div>
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Customer shall provide supply for electricity, water connection during installation & commissioning.">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button>
                                        </div>
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Customer shall provide suitable and safe space to keep the material during installation & commissioning.">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button>
                                        </div>
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Customer shall provide other facilities like ladder/stool/high-stool etc. wherever required.">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button>
                                        </div>
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Customer shall provide working internet connection (wifi/lan) and auxiliary power supply for data logger.">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button>
                                        </div>
                                        <div class="input-group mb-2"> <input type="text"
                                                name="terms_and_conditions[]" class="form-control form-control-sm"
                                                placeholder="Enter a term or condition"
                                                value="Customer shall provide free access for service personnel to work at the roof and the meter board or wherever required performing the service.">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeElement(this)">Remove</button>
                                        </div>
                                    </div> <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="addTerm()">+ Add Term</button>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>There were some errors with your submission:</strong>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

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
    <script>
        $(document).ready(function() {
            $('#contact_name').on('change', function() {
                var phone = $(this).find('option:selected').data('phone');
                $('#contact_phone').val(phone);
            });
        });
    </script>
@endsection
