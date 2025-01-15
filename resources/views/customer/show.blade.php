@extends('layouts.dashboard')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Contacts/</span> View Contact
        </h4>

        <!-- Contact Details Card -->
        <div class="row justify-content-center">
            <div class="col-xl-6"> <!-- Half-Width Card -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Contact Details</h5>
                        <small class="text-muted float-end">View contact information</small>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <!-- Type -->
                            <div class="col-md-6">
                                <label class="form-label">Type</label>
                                <p>{{ $contact->type == 'customer' ? 'Customer' : 'Lead' }}</p>
                            </div>

                            <!-- Person Name -->
                            <div class="col-md-6">
                                <label class="form-label">Person Name</label>
                                <p>{{ $contact->person_name }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Company Name -->
                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <p>{{ $contact->company_name ?? 'N/A' }}</p>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <p>{{ $contact->phone }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <p>{{ $contact->email }}</p>
                            </div>

                            <!-- GST Treatment -->
                            <div class="col-md-6">
                                <label class="form-label">GST Treatment</label>
                                <p>{{ $contact->gst_treatment }}</p>
                            </div>
                        </div>

                        <!-- Remark -->
                        <div class="mb-3">
                            <label class="form-label">Remark</label>
                            <p>{{ $contact->remark ?? 'No remarks added' }}</p>
                        </div>

                        <!-- Addresses -->
                        <div class="mb-3">
                            <h6 class="text-muted">Addresses</h6>
                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#billing-address" aria-controls="billing-address"
                                            aria-selected="true">
                                            Billing Address
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#shipping-address" aria-controls="shipping-address"
                                            aria-selected="false">
                                            Shipping Address
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Billing Address -->
                                    <div class="tab-pane fade show active" id="billing-address" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 1</label>
                                            <p>{{ $contact->billing_address_line_one }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 2</label>
                                            <p>{{ $contact->billing_address_line_two ?? 'N/A' }}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <p>{{ $contact->billing_city }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">State</label>
                                                <p>{{ $contact->billing_state ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Pincode</label>
                                                <p>{{ $contact->billing_pincode }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Country</label>
                                                <p>{{ $contact->billing_country }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipping Address -->
                                    <div class="tab-pane fade" id="shipping-address" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 1</label>
                                            <p>{{ $contact->shipping_address_line_one }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 2</label>
                                            <p>{{ $contact->shipping_address_line_two ?? 'N/A' }}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <p>{{ $contact->shipping_city }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">State</label>
                                                <p>{{ $contact->shipping_state ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Pincode</label>
                                                <p>{{ $contact->shipping_pincode }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Country</label>
                                                <p>{{ $contact->shipping_country }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to Contacts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection

@section('script')
    <!-- Optional scripts if needed for extra functionality -->
@endsection
