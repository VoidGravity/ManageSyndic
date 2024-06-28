@extends('layouts.app', ['pageTitle' => 'Contributions'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">List of contributions</h4>
                @if (in_array(Auth::user()->role, ['SYNDIC', 'ADMIN']))
                <a href="{{ route('dashboard.contribution.create') }}" class="btn btn-primary">Add new contribution</a>
                @endif
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">#</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Resident</th>
                                <th scope="col">Syndic</th>
                                @if (in_array(Auth::user()->role, ['SYNDIC', 'ADMIN']))
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @if($contributions->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No resident found.</td>
                                </tr>
                            @else
                                @foreach ($contributions as $contrubtion)
                                    <tr>
                                        <td>
                                            {{ $contrubtion->id }}
                                        </td>
                                        <td>
                                            {{ $contrubtion->price }}
                                        </td>
                                        <td>
                                            {{ $contrubtion->date }}
                                        </td>
                                        <td>
                                            {{ $contrubtion->resident->user->first_name }} {{ $contrubtion->resident->user->last_name }}
                                        </td>
                                        <td>
                                            {{ $contrubtion->syndic->user->first_name }} {{ $contrubtion->syndic->user->last_name }}
                                        </td>
                                        @if (in_array(Auth::user()->role, ['SYNDIC', 'ADMIN']))
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.contribution.exportPDF', $contrubtion) }}" class="text-body fw-medium mx-1 d-inline-block">
                                                <span class="badge bg-success-subtle text-success p-2">
                                                    <i class="ri-share-line"></i>
                                                    Export</span>
                                            </a>
                                            <a href="{{ route('dashboard.contribution.edit', $contrubtion) }}"
                                                class="text-body fw-medium mx-1 d-inline-block">
                                                <span class="badge bg-success-subtle text-success p-2">Edit</span>
                                            </a>

                                            <a href="{{ route('dashboard.contribution.delete', $contrubtion) }}"
                                                class="text-body fw-medium mx-1">
                                                <span class="badge bg-danger-subtle text-danger p-2">Delete</span>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>
@endsection