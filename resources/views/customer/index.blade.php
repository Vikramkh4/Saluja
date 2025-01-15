@extends('layouts.dashboard')
@section('content')
    @extends('layouts.dashboard')
@section('content')
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Include jQuery and DataTables JS -->
    <style>
        /* Ensure the dropdown items have proper spacing and visibility */
        .dropdown-item {
            padding: 10px;
            font-size: 14px;
        }

        .dropdown-item.text-danger {
            color: #dc3545;
            /* Danger color for Delete */
        }
    </style>


    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tables </span>
            </h4>
            <div class="card">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Table Header & Footer</h5>
                    <div class="me-3">
                        <a href="{{ route('customers.create') }}" class="btn rounded-pill btn-primary">
                            <span class="tf-icons bx bx-message-square-add"></span>&nbsp; Create Leads
                        </a>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="contact-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Created by</th>
                                <th>On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> <!-- For serial number -->
                                    <td>{{ $contact->type }}</td>
                                    <td>{{ $contact->person_name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->created_by }}</td> <!-- Assuming you have a column 'created_by' -->
                                    <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                                    <!-- Formatting the timestamp -->
                                    <td>
                                        <a href="{{ route('customers.show', $contact->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('customers.edit', $contact->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('customers.destroy', $contact->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Created by</th>
                                <th>On</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Check if the DataTable has already been initialized
            if (!$.fn.DataTable.isDataTable('#contact-table')) {
                $('#contact-table').DataTable({
                    "paging": true,
                    "searching": true,
                    "info": true
                });
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const dropdownButtons = document.querySelectorAll('.dropdown-toggle');

            dropdownButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const dropdownMenu = button.nextElementSibling;
                    dropdownMenu.classList.toggle('show');
                });
            });
        });
    </script>
@endsection


@endsection
