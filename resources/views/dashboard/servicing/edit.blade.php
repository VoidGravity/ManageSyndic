@extends('layouts.app', ['pageTitle' => 'Edit servicing'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit servicing</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <form action="{{ route('dashboard.servicing.update', $servicing) }}" method="post">
                    @csrf
                    <x-validation-errors class="mb-4" />

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-success">
                            {{ $value }}
                        </div>
                    @endsession
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Type</label>
                                <input type="text" class="form-control" id="placeholderInput" name="type"
                                    placeholder="Type" required value="{{ old('type', $servicing->type) }}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Name</label>
                                <input type="text" class="form-control" id="placeholderInput" name="name"
                                    placeholder="Name" required value="{{ old('name', $servicing->name) }}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="start" class="form-label">Start Date</label>
                                <input type="date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control" id="start" name="start" required
                                    value="{{ old('start', $servicing->start) }}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="end" class="form-label">End Date</label>
                                <input type="date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control" id="end" name="end" required
                                    value="{{ old('end', $servicing->end) }}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="end" class="form-label">Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost" required
                                    value="{{ old('cost', $servicing->cost) }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <label for="status" class="form-label">Status</label>
                                <select data-choices  class="form-select mb-3" aria-label="Default select example" name="status"
                                    required value="{{ old('status', $servicing->status) }}">
                                    <option selected="">Select a status</option>
                                    <option value="PENDING" {{ $servicing->status == 'PENDING' ? 'selected' : '' }}>
                                        PENDING</option>
                                    <option value="STARTED" {{ $servicing->status == 'STARTED' ? 'selected' : '' }}>
                                        STARTED</option>
                                    <option value="FINISHED" {{ $servicing->status == 'FINISHED' ? 'selected' : '' }}>
                                        FINISHED</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="end" class="form-label">Building</label>
                            <select data-choices  class="form-select mb-3" aria-label="Default select example" name="building"
                                required value="{{ old('building', $servicing->building_id) }}">
                                <option selected="">Select a building</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}"
                                        {{ $building->id == $servicing->building->id ? 'selected' : '' }}
                                    >{{ $building->id }} - {{ $building->name }}
                                        ({{$building->number}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-12 col-md-12 text-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>
@endsection