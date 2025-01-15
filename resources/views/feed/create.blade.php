@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4">Sold Proposal Feedback</h2>


        {{-- Step 1: Select Proposal --}}
        <form id="proposalSelectForm">
            <div class="mb-3">
                <label for="proposal_id" class="form-label">Select Proposal</label>
                <select name="proposal_id" id="proposal_id" class="form-select" required>
                    <option value="">-- Select a Proposal --</option>
                    @foreach ($proposals as $proposal)
                        <option value="{{ $proposal->id }}" data-proposal-name="{{ $proposal->proposal_name }}">
                            {{ $proposal->id }} - {{ $proposal->proposal_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="loadFeedbackForm">Load Feedback Form</button>
        </form>

        <hr>

        {{-- Step 2: Feedback Form --}}
        <div class="container my-5">
            <div class="card shadow p-4">
                <h4 class="card-title text-center mb-4">Submit Feedback</h4>
                <form id="feedbackForm" method="POST" action="{{ route('feeds.store') }}"style="display: none;">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="proposal_id" id="selected_proposal_id">

                    <!-- Feasibility Approval -->
                    <div class="row mb-3">
                        <label for="proposal_name" class="form-label">Proposal Name</label>
                        <input type="text" id="proposal_name" name="proposal_name" class="form-control"
                            placeholder="Enter proposal name" readonly>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feasibility_approval"
                                    name="feasibility_approval" value="1">
                                <label class="form-check-label" for="feasibility_approval">Feasibility Approval</label>
                            </div>
                        </div>

                        <!-- Finance Availability -->
                        <div class="col-md-6">
                            <label class="form-label">Finance Availability</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="finance_yes"
                                        name="finance_availability" value="1">
                                    <label class="form-check-label" for="finance_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="finance_no"
                                        name="finance_availability" value="0">
                                    <label class="form-check-label" for="finance_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Group: Customer Agreement and Related Fields -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="customer_sign_on_quotation"
                                    name="customer_sign_on_quotation" value="1">
                                <label class="form-check-label" for="customer_sign_on_quotation">Customer Sign on
                                    Quotation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="customer_agreement"
                                    name="customer_agreement" value="1">
                                <label class="form-check-label" for="customer_agreement">Customer Agreement</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sin_mail_paperwork"
                                    name="sin_mail_paperwork" value="1">
                                <label class="form-check-label" for="sin_mail_paperwork">SIN Mail/Paperwork</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="zone_ae_sign" name="zone_ae_sign"
                                    value="1">
                                <label class="form-check-label" for="zone_ae_sign">Zone (A.E) Sign</label>
                            </div>
                        </div>
                    </div>

                    <!-- Meter Fields -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="meter_mapping_payment_date" class="form-label">Meter (Mapping / Payment)
                                Date</label>
                            <input type="date" id="meter_mapping_payment_date" name="meter_mapping_payment_date"
                                class="form-control">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="meter_installed"
                                    name="meter_installed" value="1">
                                <label class="form-check-label" for="meter_installed">Meter Installation</label>
                            </div>
                        </div>
                    </div>

                    <!-- Inspection Status -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Inspection Status</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="inspection_okay"
                                        name="inspection_status" value="okay">
                                    <label class="form-check-label" for="inspection_okay">Okay</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="inspection_not_okay"
                                        name="inspection_status" value="not_okay">
                                    <label class="form-check-label" for="inspection_not_okay">Not Okay</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="project_commissioned"
                                    name="project_commissioned" value="1">
                                <label class="form-check-label" for="project_commissioned">Project
                                    Commissioned</label>
                            </div>
                        </div>
                    </div>

                    <!-- Subsidy Section -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Subsidy Requested</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="subsidy_requested_yes"
                                        name="subsidy_requested" value="1">
                                    <label class="form-check-label" for="subsidy_requested_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="subsidy_requested_no"
                                        name="subsidy_requested" value="0">
                                    <label class="form-check-label" for="subsidy_requested_no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subsidy Claimed</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="subsidy_claimed_done"
                                        name="subsidy_claimed" value="done">
                                    <label class="form-check-label" for="subsidy_claimed_done">Done</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="subsidy_claimed_not_done"
                                        name="subsidy_claimed" value="not_done">
                                    <label class="form-check-label" for="subsidy_claimed_not_done">Not Done</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50">Submit Feedback</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    </div>
@endsection
@section('script')
    {{-- JavaScript to Handle Form Display --}}
    <script>
        document.getElementById('loadFeedbackForm').addEventListener('click', function() {
            const proposalSelect = document.getElementById('proposal_id');
            const selectedOption = proposalSelect.options[proposalSelect.selectedIndex];

            if (selectedOption.value) {
                const selectedProposalId = selectedOption.value;
                const selectedProposalName = selectedOption.getAttribute('data-proposal-name');

                document.getElementById('selected_proposal_id').value = selectedProposalId;
                document.getElementById('proposal_name').value = selectedProposalName;

                document.getElementById('feedbackForm').style.display = 'block';
            } else {
                alert('Please select a proposal first.');
            }
        });
    </script>
@endsection
