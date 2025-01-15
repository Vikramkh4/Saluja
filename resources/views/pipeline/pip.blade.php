@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid p-5" style="background-color: #fff; min-height: 100vh;">
        <div class="container">
            <h2 class="mb-4 text-center">Proposal Pipeline</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @foreach (['Proposed', 'Discussion', 'Sold'] as $stage)
                    @php
                        $gradientColor = match ($stage) {
                            'Proposed' => 'linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%)', // Gradient red
                            'Discussion' => 'linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%)', // Gradient yellow
                            'Sold' => 'linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%)', // Gradient green
                            default => 'linear-gradient(135deg, #e2e3e5 0%, #d6d8db 100%)', // Default gray gradient
                        };
                        $icon = match ($stage) {
                            'Proposed' => 'fas fa-lightbulb',
                            'Discussion' => 'fas fa-comments',
                            'Sold' => 'fas fa-handshake',
                            default => 'fas fa-folder-open',
                        };
                    @endphp
                    <div class="col">
                        <div class="card h-100 shadow-sm" style="background: {{ $gradientColor }};">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    <i class="{{ $icon }} me-2"></i>{{ $stage }}
                                </h4>
                                <ul class="list-group proposal-stage" data-stage="{{ $stage }}"
                                    style="min-height: 200px; border: 1px solid #ccc; padding: 10px; background: #fff;">
                                    @foreach ($proposals->where('status', $stage) as $proposal)
                                        <li class="list-group-item" data-id="{{ $proposal->id }}">
                                            {{ $proposal->proposal_name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Include jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        /* Custom hover effect for cards */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }
    </style>

    <script>
        $(function() {
            // Make proposals draggable and droppable
            $(".proposal-stage").sortable({
                connectWith: ".proposal-stage",
                update: function(event, ui) {
                    const proposalId = ui.item.data('id');
                    const newStage = $(this).data('stage');

                    // AJAX request to update the stage
                    $.ajax({
                        url: "{{ route('proposals.updateStatus') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: proposalId,
                            status: newStage
                        },
                        success: function(response) {
                            console.log(response.message);
                        },
                        error: function(xhr) {
                            alert('Error updating proposal status');
                        }
                    });
                }
            }).disableSelection();
        });
    </script>
@endsection
