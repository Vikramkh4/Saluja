@extends('layouts.dashboard')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms/</span> Vertical Layouts
        </h4>

        <!-- Edit Contact Form -->
        <div class="row justify-content-center">
            <div class="col-xl-6"> <!-- Half-Width Form -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Contact</h5>
                        <small class="text-muted float-end">Edit existing contact</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Type (Customer/Lead) -->
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="contact-type">Type</label>
                                    <div style="display: flex; align-items: center;">
                                        <div class="form-check" style="margin-right: 10px;">
                                            <input class="form-check-input" type="radio" id="type-customer" name="type"
                                                value="customer" {{ $contact->type == 'Customer' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="type-customer">
                                                <i class="bx bx-user-circle"></i> Customer
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="type-lead" name="type"
                                                value="lead" {{ $contact->type == 'Lead' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="type-lead">
                                                <i class="bx bx-user-circle"></i> Lead
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <!-- Person Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="person-name">Person Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" id="person-name" name="person_name" class="form-control"
                                            value="{{ old('person_name', $contact->person_name) }}" placeholder="John Doe"
                                            required />
                                    </div>
                                </div>

                                <!-- Company Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="company-name">Company Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                        <input type="text" id="company-name" name="company_name" class="form-control"
                                            value="{{ old('company_name', $contact->company_name) }}"
                                            placeholder="ACME Inc." />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="phone">Phone</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ old('phone', $contact->phone) }}" placeholder="123-456-7890"
                                            required />
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email', $contact->email) }}" placeholder="example@domain.com"
                                            required />
                                    </div>
                                </div>
                            </div>

                            <!-- Remark -->
                            <div class="mb-3">
                                <label class="form-label" for="remark">Remark</label>
                                <textarea id="remark" name="remark" class="form-control" placeholder="Add a remark...">{{ old('remark', $contact->remark) }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="gst-treatment">GST Treatment</label>
                                <select class="form-select" id="gst-treatment" name="gst_treatment" required>
                                    <option value="" selected disabled>Select GST Treatment</option>
                                    <option value="Consumer" {{ $contact->gst_treatment == 'Consumer' ? 'selected' : '' }}>
                                        Consumer</option>
                                    <option value="Business -GST Regular"
                                        {{ $contact->gst_treatment == 'Business -GST Regular' ? 'selected' : '' }}>Business
                                        - GST Regular</option>
                                    <option value="Business -GST Composition"
                                        {{ $contact->gst_treatment == 'Business -GST Composition' ? 'selected' : '' }}>
                                        Business - GST Composition</option>
                                    <option value="Business -Unregistered"
                                        {{ $contact->gst_treatment == 'Business -Unregistered' ? 'selected' : '' }}>
                                        Business - Unregistered</option>
                                    <option value="Business -GST Exempted"
                                        {{ $contact->gst_treatment == 'Business -GST Exempted' ? 'selected' : '' }}>
                                        Business - GST Exempted</option>
                                </select>
                            </div>

                            <!-- Addresses -->
                            <div class="mb-3">
                                <h6 class="text-muted">Addresses</h6>
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#billing-address"
                                                aria-controls="billing-address" aria-selected="true">
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
                                                <label class="form-label" for="billing-line1">Address Line 1</label>
                                                <input type="text" id="billing-line1" name="billing_address_line_one"
                                                    class="form-control"
                                                    value="{{ old('billing_address_line_one', $contact->billing_address_line_one) }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="billing-line2">Address Line 2</label>
                                                <input type="text" id="billing-line2" name="billing_address_line_two"
                                                    class="form-control"
                                                    value="{{ old('billing_address_line_two', $contact->billing_address_line_two) }}" />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-city">City</label>
                                                    <input type="text" id="billing-city" name="billing_city"
                                                        class="form-control"
                                                        value="{{ old('billing_city', $contact->billing_city) }}" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-state">State</label>
                                                    <select id="billing-state" name="billing_state" class="form-control">
                                                        <option value="" disabled selected>Select State</option>
                                                        <!-- Add state options here -->
                                                        <option value="AP"
                                                            {{ old('billing_state', $contact->billing_state) == 'AP' ? 'selected' : '' }}>
                                                            Andhra Pradesh</option>
                                                        <option value="AR"
                                                            {{ old('billing_state', $contact->billing_state) == 'AR' ? 'selected' : '' }}>
                                                            Arunachal Pradesh</option>
                                                        <option value="AS"
                                                            {{ old('billing_state', $contact->billing_state) == 'AS' ? 'selected' : '' }}>
                                                            Assam</option>
                                                        <option value="BR"
                                                            {{ old('billing_state', $contact->billing_state) == 'BR' ? 'selected' : '' }}>
                                                            Bihar</option>
                                                        <option value="CT"
                                                            {{ old('billing_state', $contact->billing_state) == 'CT' ? 'selected' : '' }}>
                                                            Chhattisgarh</option>
                                                        <option value="GA"
                                                            {{ old('billing_state', $contact->billing_state) == 'GA' ? 'selected' : '' }}>
                                                            Goa</option>
                                                        <option value="GJ"
                                                            {{ old('billing_state', $contact->billing_state) == 'GJ' ? 'selected' : '' }}>
                                                            Gujarat</option>
                                                        <option value="HR"
                                                            {{ old('billing_state', $contact->billing_state) == 'HR' ? 'selected' : '' }}>
                                                            Haryana</option>
                                                        <option value="HP"
                                                            {{ old('billing_state', $contact->billing_state) == 'HP' ? 'selected' : '' }}>
                                                            Himachal Pradesh</option>
                                                        <option value="JK"
                                                            {{ old('billing_state', $contact->billing_state) == 'JK' ? 'selected' : '' }}>
                                                            Jammu and Kashmir</option>
                                                        <option value="JH"
                                                            {{ old('billing_state', $contact->billing_state) == 'JH' ? 'selected' : '' }}>
                                                            Jharkhand</option>
                                                        <option value="KA"
                                                            {{ old('billing_state', $contact->billing_state) == 'KA' ? 'selected' : '' }}>
                                                            Karnataka</option>
                                                        <option value="KL"
                                                            {{ old('billing_state', $contact->billing_state) == 'KL' ? 'selected' : '' }}>
                                                            Kerala</option>
                                                        <option value="MP"
                                                            {{ old('billing_state', $contact->billing_state) == 'MP' ? 'selected' : '' }}>
                                                            Madhya Pradesh</option>
                                                        <option value="MH"
                                                            {{ old('billing_state', $contact->billing_state) == 'MH' ? 'selected' : '' }}>
                                                            Maharashtra</option>
                                                        <option value="MN"
                                                            {{ old('billing_state', $contact->billing_state) == 'MN' ? 'selected' : '' }}>
                                                            Manipur</option>
                                                        <option value="ML"
                                                            {{ old('billing_state', $contact->billing_state) == 'ML' ? 'selected' : '' }}>
                                                            Meghalaya</option>
                                                        <option value="MZ"
                                                            {{ old('billing_state', $contact->billing_state) == 'MZ' ? 'selected' : '' }}>
                                                            Mizoram</option>
                                                        <option value="NL"
                                                            {{ old('billing_state', $contact->billing_state) == 'NL' ? 'selected' : '' }}>
                                                            Nagaland</option>
                                                        <option value="OR"
                                                            {{ old('billing_state', $contact->billing_state) == 'OR' ? 'selected' : '' }}>
                                                            Odisha</option>
                                                        <option value="PB"
                                                            {{ old('billing_state', $contact->billing_state) == 'PB' ? 'selected' : '' }}>
                                                            Punjab</option>
                                                        <option value="RJ"
                                                            {{ old('billing_state', $contact->billing_state) == 'RJ' ? 'selected' : '' }}>
                                                            Rajasthan</option>
                                                        <option value="SK"
                                                            {{ old('billing_state', $contact->billing_state) == 'SK' ? 'selected' : '' }}>
                                                            Sikkim</option>
                                                        <option value="TN"
                                                            {{ old('billing_state', $contact->billing_state) == 'TN' ? 'selected' : '' }}>
                                                            Tamil Nadu</option>
                                                        <option value="TG"
                                                            {{ old('billing_state', $contact->billing_state) == 'TG' ? 'selected' : '' }}>
                                                            Telangana</option>
                                                        <option value="TR"
                                                            {{ old('billing_state', $contact->billing_state) == 'TR' ? 'selected' : '' }}>
                                                            Tripura</option>
                                                        <option value="UT"
                                                            {{ old('billing_state', $contact->billing_state) == 'UT' ? 'selected' : '' }}>
                                                            Uttarakhand</option>
                                                        <option value="UP"
                                                            {{ old('billing_state', $contact->billing_state) == 'UP' ? 'selected' : '' }}>
                                                            Uttar Pradesh</option>
                                                        <option value="WB"
                                                            {{ old('billing_state', $contact->billing_state) == 'WB' ? 'selected' : '' }}>
                                                            West Bengal</option>
                                                        <option value="AN"
                                                            {{ old('billing_state', $contact->billing_state) == 'AN' ? 'selected' : '' }}>
                                                            Andaman and Nicobar Islands</option>
                                                        <option value="CH"
                                                            {{ old('billing_state', $contact->billing_state) == 'CH' ? 'selected' : '' }}>
                                                            Chandigarh</option>
                                                        <option value="DN"
                                                            {{ old('billing_state', $contact->billing_state) == 'DN' ? 'selected' : '' }}>
                                                            Dadra and Nagar Haveli</option>
                                                        <option value="DD"
                                                            {{ old('billing_state', $contact->billing_state) == 'DD' ? 'selected' : '' }}>
                                                            Daman and Diu</option>
                                                        <option value="DL"
                                                            {{ old('billing_state', $contact->billing_state) == 'DL' ? 'selected' : '' }}>
                                                            Delhi</option>
                                                        <option value="LD"
                                                            {{ old('billing_state', $contact->billing_state) == 'LD' ? 'selected' : '' }}>
                                                            Lakshadweep</option>
                                                        <option value="PY"
                                                            {{ old('billing_state', $contact->billing_state) == 'PY' ? 'selected' : '' }}>
                                                            Puducherry</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-pincode">Pincode</label>
                                                    <input type="text" id="billing-pincode" name="billing_pincode"
                                                        class="form-control"
                                                        value="{{ old('billing_pincode', $contact->billing_pincode) }}" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-country">Country</label>
                                                    <input type="text" id="billing-country" name="billing_country"
                                                        class="form-control"
                                                        value="{{ old('billing_country', $contact->billing_country) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Shipping Address -->
                                        <div class="tab-pane fade" id="shipping-address" role="tabpanel">
                                            <div class="mb-3">
                                                <label class="form-label" for="shipping-line1">Address Line 1</label>
                                                <input type="text" id="shipping-line1"
                                                    name="shipping_address_line_one" class="form-control"
                                                    value="{{ old('shipping_address_line_one', $contact->shipping_address_line_one) }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="shipping-line2">Address Line 2</label>
                                                <input type="text" id="shipping-line2"
                                                    name="shipping_address_line_two" class="form-control"
                                                    value="{{ old('shipping_address_line_two', $contact->shipping_address_line_two) }}" />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-city">City</label>
                                                    <input type="text" id="shipping-city" name="shipping_city"
                                                        class="form-control"
                                                        value="{{ old('shipping_city', $contact->shipping_city) }}" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-state">State</label>
                                                    <select id="shipping-state" name="shipping_state"
                                                        class="form-control">
                                                        <option value="" disabled selected>Select State</option>
                                                        <!-- Add state options here -->
                                                        <option value="AP"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'AP' ? 'selected' : '' }}>
                                                            Andhra Pradesh</option>
                                                        <option value="AR"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'AR' ? 'selected' : '' }}>
                                                            Arunachal Pradesh</option>
                                                        <option value="AS"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'AS' ? 'selected' : '' }}>
                                                            Assam</option>
                                                        <option value="BR"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'BR' ? 'selected' : '' }}>
                                                            Bihar</option>
                                                        <option value="CT"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'CT' ? 'selected' : '' }}>
                                                            Chhattisgarh</option>
                                                        <option value="GA"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'GA' ? 'selected' : '' }}>
                                                            Goa</option>
                                                        <option value="GJ"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'GJ' ? 'selected' : '' }}>
                                                            Gujarat</option>
                                                        <option value="HR"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'HR' ? 'selected' : '' }}>
                                                            Haryana</option>
                                                        <option value="HP"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'HP' ? 'selected' : '' }}>
                                                            Himachal Pradesh</option>
                                                        <option value="JK"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'JK' ? 'selected' : '' }}>
                                                            Jammu and Kashmir</option>
                                                        <option value="JH"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'JH' ? 'selected' : '' }}>
                                                            Jharkhand</option>
                                                        <option value="KA"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'KA' ? 'selected' : '' }}>
                                                            Karnataka</option>
                                                        <option value="KL"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'KL' ? 'selected' : '' }}>
                                                            Kerala</option>
                                                        <option value="MP"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'MP' ? 'selected' : '' }}>
                                                            Madhya Pradesh</option>
                                                        <option value="MH"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'MH' ? 'selected' : '' }}>
                                                            Maharashtra</option>
                                                        <option value="MN"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'MN' ? 'selected' : '' }}>
                                                            Manipur</option>
                                                        <option value="ML"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'ML' ? 'selected' : '' }}>
                                                            Meghalaya</option>
                                                        <option value="MZ"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'MZ' ? 'selected' : '' }}>
                                                            Mizoram</option>
                                                        <option value="NL"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'NL' ? 'selected' : '' }}>
                                                            Nagaland</option>
                                                        <option value="OR"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'OR' ? 'selected' : '' }}>
                                                            Odisha</option>
                                                        <option value="PB"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'PB' ? 'selected' : '' }}>
                                                            Punjab</option>
                                                        <option value="RJ"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'RJ' ? 'selected' : '' }}>
                                                            Rajasthan</option>
                                                        <option value="SK"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'SK' ? 'selected' : '' }}>
                                                            Sikkim</option>
                                                        <option value="TN"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'TN' ? 'selected' : '' }}>
                                                            Tamil Nadu</option>
                                                        <option value="TG"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'TG' ? 'selected' : '' }}>
                                                            Telangana</option>
                                                        <option value="TR"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'TR' ? 'selected' : '' }}>
                                                            Tripura</option>
                                                        <option value="UT"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'UT' ? 'selected' : '' }}>
                                                            Uttarakhand</option>
                                                        <option value="UP"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'UP' ? 'selected' : '' }}>
                                                            Uttar Pradesh</option>
                                                        <option value="WB"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'WB' ? 'selected' : '' }}>
                                                            West Bengal</option>
                                                        <option value="AN"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'AN' ? 'selected' : '' }}>
                                                            Andaman and Nicobar Islands</option>
                                                        <option value="CH"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'CH' ? 'selected' : '' }}>
                                                            Chandigarh</option>
                                                        <option value="DN"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'DN' ? 'selected' : '' }}>
                                                            Dadra and Nagar Haveli</option>
                                                        <option value="DD"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'DD' ? 'selected' : '' }}>
                                                            Daman and Diu</option>
                                                        <option value="DL"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'DL' ? 'selected' : '' }}>
                                                            Delhi</option>
                                                        <option value="LD"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'LD' ? 'selected' : '' }}>
                                                            Lakshadweep</option>
                                                        <option value="PY"
                                                            {{ old('shipping_state', $contact->shipping_state) == 'PY' ? 'selected' : '' }}>
                                                            Puducherry</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-pincode">Pincode</label>
                                                    <input type="text" id="shipping-pincode" name="shipping_pincode"
                                                        class="form-control"
                                                        value="{{ old('shipping_pincode', $contact->shipping_pincode) }}" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-country">Country</label>
                                                    <input type="text" id="shipping-country" name="shipping_country"
                                                        class="form-control"
                                                        value="{{ old('shipping_country', $contact->shipping_country) }}" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection
@section('script')
@endsection
