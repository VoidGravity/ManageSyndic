@extends('layouts.app', ['pageTitle' => 'Syndics'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">List of syndics</h4>
                <a href="{{ route('dashboard.admin.syndic.create') }}" class="btn btn-primary">Add new syndic</a>
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
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($syndics->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No syndic found.</td>
                                </tr>
                            @else
                                @foreach ($syndics as $syndic)
                                    <tr>
                                        <td>
                                            {{ $syndic->id }}
                                        </td>
                                        <td>
                                            {{ $syndic->user->first_name }}
                                        </td>
                                        <td>
                                            {{ $syndic->user->last_name }}
                                        </td>
                                        <td>
                                            {{ $syndic->user->username }}
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $syndic->user->email }}">{{ $syndic->user->email }}</a>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.admin.syndic.edit', $syndic) }}"
                                                class="text-body fw-medium mx-1 d-inline-block">
                                                <span class="badge bg-success-subtle text-success p-2">Edit</span>
                                            </a>

                                            <a href="{{ route('dashboard.admin.syndic.delete', $syndic) }}"
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