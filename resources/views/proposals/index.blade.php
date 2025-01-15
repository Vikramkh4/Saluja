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
                <span class="text-muted fw-light">Tables /</span> Basic Tables
            </h4>
            <div class="card">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Table Header & Footer</h5>
                    <div class="me-3">
                        <a href="{{ route('proposals.create') }}" class="btn rounded-pill btn-primary">
                            <span class="tf-icons bx bx-message-square-add"></span>&nbsp; Create Proposal
                        </a>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="proposals-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Size</th>
                                <th>Proposed To</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Created by</th>
                                <th>On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $proposal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $proposal->project_size }} kW</td>
                                    <td>{{ $proposal->proposal_name }}</td>
                                    <td>{{ $proposal->contact_name }}</td>
                                    <td>{{ $proposal->status }}</td>
                                    <td>{{ $proposal->created_by }}</td>
                                    <td>{{ $proposal->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="text-secondary " id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('proposals.duplicate', $proposal->id) }}">Duplicate</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('proposals.edit', $proposal->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('proposals.destroy', $proposal->id) }}"
                                                        method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item text-danger">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Size</th>
                                <th>Proposed To</th>
                                <th>Phone</th>
                                <th>Status</th>
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
            $('#proposals-table').DataTable({
                "paging": true,
                "searching": true,
                "info": true
            });
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
