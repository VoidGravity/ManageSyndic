@extends('layouts.app', ['pageTitle' => 'Servicings'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">List of servicings</h4>
                <a href="{{ route('dashboard.admin.servicing.create') }}" class="btn btn-primary">Add new servicing</a>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">#</th>
                                <th scope="col">type</th>
                                <th scope="col">name</th>
                                <th scope="col">cost</th>
                                <th scope="col">start</th>
                                <th scope="col">end</th>
                                <th scope="col">status</th>
                                <th scope="col">Building</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($servicings->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No resident found.</td>
                                </tr>
                            @else
                                @foreach ($servicings as $servicing)
                                    <tr>
                                        <td>
                                            {{ $servicing->id }}
                                        </td>
                                        <td>
                                            {{ $servicing->type }}
                                        </td>
                                        <td>
                                            {{ $servicing->name }}
                                        </td>
                                        <td>
                                            {{ $servicing->cost }}
                                        </td>
                                        <td>
                                            {{ $servicing->start }}
                                        </td>
                                        <td>
                                            {{ $servicing->end }}
                                        </td>
                                        <td>
                                            {{ $servicing->status }}
                                        </td>
                                        <td>
                                            {{ $servicing->Building->name }}
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.admin.servicing.edit', $servicing) }}"
                                                class="text-body fw-medium mx-1 d-inline-block">
                                                <span class="badge bg-success-subtle text-success p-2">Edit</span>
                                            </a>

                                            <a href="{{ route('dashboard.admin.servicing.delete', $servicing) }}"
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