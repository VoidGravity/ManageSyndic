@extends('layouts.app', ['pageTitle' => 'residents'])
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">List of residents</h4>
                    @if (in_array(Auth::user()->role, ['ADMIN', 'SYNDIC']))
                        <a href="{{ route('dashboard.resident.create') }}" class="btn btn-primary">Add new resident</a>
                    @endif
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">#</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Apartment number</th>
                                    <th scope="col">Monthly contrubtion</th>
                                    <th scope="col">Buildings</th>
                                    @if (in_array(Auth::user()->role, ['ADMIN','SYNDIC']))
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @if ($residents->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">No resident found.</td>
                                    </tr>
                                @else
                                    @foreach ($residents as $resident)
                                        <tr>
                                            <td>
                                                {{ $resident->id }}
                                            </td>
                                            <td>
                                                {{ $resident->user->first_name }}
                                            </td>
                                            <td>
                                                {{ $resident->user->last_name }}
                                            </td>
                                            <td>
                                                {{ $resident->user->username }}
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $resident->user->email }}">{{ $resident->user->email }}</a>
                                            </td>
                                            <td>
                                                {{ $resident->apartment_number }}
                                            </td>
                                            <td>
                                                {{ $resident->monthly_contrubtion }}
                                            </td>
                                            <td>
                                                {{ $resident->building->name }} (N°{{ $resident->building->number }})
                                            </td>
                                            @if (in_array(Auth::user()->role, ['ADMIN','SYNDIC']))
                                                <td class="d-flex">
                                                    <a href="{{ route('dashboard.resident.edit', $resident) }}" class="text-body fw-medium mx-1 d-inline-block">
                                                        <span class="badge bg-success-subtle text-success p-2">Edit</span>
                                                    </a>

                                                    <a href="{{ route('dashboard.resident.delete', $resident) }}" class="text-body fw-medium mx-1">
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
