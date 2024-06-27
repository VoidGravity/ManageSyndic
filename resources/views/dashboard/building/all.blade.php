@extends('layouts.app', ['pageTitle' => 'buildings'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">List of buildings</h4>
                <a href="{{ route('dashboard.building.create') }}" class="btn btn-primary">Add new building</a>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">number</th>
                                <th scope="col">address</th>
                                <th scope="col">syndic</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($buildings->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No building found.</td>
                                </tr>
                            @else
                                @foreach ($buildings as $building)
                                    <tr>
                                        <td>
                                            {{ $building->id }}
                                        </td>
                                        <td>
                                            {{ $building->name }}
                                        </td>
                                        <td>
                                            {{ $building->number }}
                                        </td>
                                        <td>
                                            {{ $building->address }}
                                        </td>
                                        <td>
                                        {{ $building->syndic->user->first_name}}
                                        {{ $building->syndic->user->last_name}}
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.building.edit', $building) }}"
                                                class="text-body fw-medium mx-1 d-inline-block">
                                                <span class="badge bg-success-subtle text-success p-2">Edit</span>
                                            </a>

                                            <a href="{{ route('dashboard.building.delete', $building) }}"
                                                class="text-body fw-medium mx-1">
                                                <span class="badge bg-danger-subtle text-danger p-2">Delete</span>
                                            </a>
                                        </td>
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