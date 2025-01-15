@extends('layouts.dashboard')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms/</span> Vertical Layouts
        </h4>

        <!-- Contact Form -->
        <div class="row justify-content-center">
            <div class="col-xl-6"> <!-- Half-Width Form -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Contact</h5>
                        <small class="text-muted float-end">Add new contact</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf

                            <!-- Type (Customer/Lead) -->
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="contact-type">Type</label>
                                    <div style="display: flex; align-items: center;">
                                        <div class="form-check" style="margin-right: 10px;">
                                            <input class="form-check-input" type="radio" id="type-customer" name="type"
                                                value="customer" />
                                            <label class="form-check-label" for="type-customer">
                                                <i class="bx bx-user-circle"></i> Customer
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
                                            placeholder="John Doe" required />
                                    </div>
                                </div>

                                <!-- Company Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="company-name">Company Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                        <input type="text" id="company-name" name="company_name" class="form-control"
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
                                            placeholder="123-456-7890" required />
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="example@domain.com" required />
                                    </div>
                                </div>
                            </div>
                            <!-- Phone -->


                            <!-- Remark -->
                            <div class="mb-3">
                                <label class="form-label" for="remark">Remark</label>
                                <textarea id="remark" name="remark" class="form-control" placeholder="Add a remark..."></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="gst-treatment">GST Treatment</label>
                                <select class="form-select" id="gst-treatment" name="gst_treatment" required>
                                    <option value="" selected disabled>Select GST Treatment</option>
                                    <option value="Consumer">Consumer</option>
                                    <option value="Business -GST Regular">Business - GST Regular</option>
                                    <option value="Business -GST Composition">Business - GST Composition</option>
                                    <option value="Business -Unregistered">Business - Unregistered</option>
                                    <option value="Business -GST Exempted">Business - GST Exempted</option>
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
                                                    class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="billing-line2">Address Line 2</label>
                                                <input type="text" id="billing-line2" name="billing_address_line_two"
                                                    class="form-control" />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-city">City</label>
                                                    <input type="text" id="billing-city" name="billing_city"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-state">State</label>
                                                    <select type="text" id="billing-state" name="billing_state"
                                                        class="form-control">
                                                        <option value="" disabled selected>Select State</option>
                                                        <option value="AP">Andhra Pradesh</option>
                                                        <option value="AR">Arunachal Pradesh</option>
                                                        <option value="AS">Assam</option>
                                                        <option value="BR">Bihar</option>
                                                        <option value="CT">Chhattisgarh</option>
                                                        <option value="GA">Gujarat</option>
                                                        <option value="HR">Haryana</option>
                                                        <option value="HP">Himachal Pradesh</option>
                                                        <option value="JK">Jammu and Kashmir</option>
                                                        <option value="GA">Goa</option>
                                                        <option value="JH">Jharkhand</option>
                                                        <option value="KA">Karnataka</option>
                                                        <option value="KL">Kerala</option>
                                                        <option value="MP">Madhya Pradesh</option>
                                                        <option value="MH">Maharashtra</option>
                                                        <option value="MN">Manipur</option>
                                                        <option value="ML">Meghalaya</option>
                                                        <option value="MZ">Mizoram</option>
                                                        <option value="NL">Nagaland</option>
                                                        <option value="OR">Odisha</option>
                                                        <option value="PB">Punjab</option>
                                                        <option value="RJ">Rajasthan</option>
                                                        <option value="SK">Sikkim</option>
                                                        <option value="TN">Tamil Nadu</option>
                                                        <option value="TG">Telangana</option>
                                                        <option value="TR">Tripura</option>
                                                        <option value="UT">Uttarakhand</option>
                                                        <option value="UP">Uttar Pradesh</option>
                                                        <option value="WB">West Bengal</option>
                                                        <option value="AN">Andaman and Nicobar Islands</option>
                                                        <option value="CH">Chandigarh</option>
                                                        <option value="DN">Dadra and Nagar Haveli</option>
                                                        <option value="DD">Daman and Diu</option>
                                                        <option value="DL">Delhi</option>
                                                        <option value="LD">Lakshadweep</option>
                                                        <option value="PY">Puducherry</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-pincode">Pincode</label>
                                                    <input type="text" id="billing-pincode" name="billing_pincode"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="billing-country">Country</label>
                                                    <input type="text" id="billing-country" name="billing_country"
                                                        class="form-control" />
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Shipping Address -->
                                        <div class="tab-pane fade" id="shipping-address" role="tabpanel">
                                            <div class="mb-3">
                                                <label class="form-label" for="shipping-line1">Address Line 1</label>
                                                <input type="text" id="shipping-line1"
                                                    name="shipping_address_line_one" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="shipping-line2">Address Line 2</label>
                                                <input type="text" id="shipping-line2"
                                                    name="shipping_address_line_two" class="form-control" />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-city">City</label>
                                                    <input type="text" id="shipping-city" name="shipping_city"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-state">State</label>
                                                    <select id="shipping-state" name="shipping_state"
                                                        class="form-control">
                                                        <option value="" disabled selected>Select State</option>
                                                        <!-- Add state options here -->
                                                        <option value="AP">Andhra Pradesh</option>
                                                        <option value="AR">Arunachal Pradesh</option>
                                                        <option value="AS">Assam</option>
                                                        <option value="BR">Bihar</option>
                                                        <option value="CT">Chhattisgarh</option>
                                                        <option value="GA">Gujarat</option>
                                                        <option value="HR">Haryana</option>
                                                        <option value="HP">Himachal Pradesh</option>
                                                        <option value="JK">Jammu and Kashmir</option>
                                                        <option value="GA">Goa</option>
                                                        <option value="JH">Jharkhand</option>
                                                        <option value="KA">Karnataka</option>
                                                        <option value="KL">Kerala</option>
                                                        <option value="MP">Madhya Pradesh</option>
                                                        <option value="MH">Maharashtra</option>
                                                        <option value="MN">Manipur</option>
                                                        <option value="ML">Meghalaya</option>
                                                        <option value="MZ">Mizoram</option>
                                                        <option value="NL">Nagaland</option>
                                                        <option value="OR">Odisha</option>
                                                        <option value="PB">Punjab</option>
                                                        <option value="RJ">Rajasthan</option>
                                                        <option value="SK">Sikkim</option>
                                                        <option value="TN">Tamil Nadu</option>
                                                        <option value="TG">Telangana</option>
                                                        <option value="TR">Tripura</option>
                                                        <option value="UT">Uttarakhand</option>
                                                        <option value="UP">Uttar Pradesh</option>
                                                        <option value="WB">West Bengal</option>
                                                        <option value="AN">Andaman and Nicobar Islands</option>
                                                        <option value="CH">Chandigarh</option>
                                                        <option value="DN">Dadra and Nagar Haveli</option>
                                                        <option value="DD">Daman and Diu</option>
                                                        <option value="DL">Delhi</option>
                                                        <option value="LD">Lakshadweep</option>
                                                        <option value="PY">Puducherry</option>
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-pincode">Pincode</label>
                                                    <input type="text" id="shipping-pincode" name="shipping_pincode"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="shipping-country">Country</label>
                                                    <input type="text" id="shipping-country" name="shipping_country"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Create Contact</button>
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
