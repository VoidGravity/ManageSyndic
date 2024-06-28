@extends('layouts.app', ['pageTitle' => 'Add new servicing'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add new servicing</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                @if($buildings->count() == 0)
                    <div class="alert alert-info" role="alert">
                        <strong>This Page depends on buildings</strong>, To be able to add a servicing, add a building first.
                    </div>
                @endif
                <form action="{{ route('dashboard.servicing.save') }}" method="post">
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
                                <input type="text" class="form-control" id="placeholderInput" name="type" placeholder="Type" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Name</label>
                                <input type="text" class="form-control" id="placeholderInput" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="start" class="form-label">Start Date</label>
                                <input type="date" data-provider="flatpickr" data-date-format="y-m-d" class="form-control" id="start" name="start" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="end" class="form-label">End Date</label>
                                <input type="date" data-provider="flatpickr" data-date-format="y-m-d" class="form-control" id="end" name="end" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="end" class="form-label">Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost" value="0.00"required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <label for="status" class="form-label">Status</label>
                                <select data-choices  class="form-select mb-3" aria-label="Default select example" name="status" required>
                                <option selected="">Select a status</option>
                                <option value="PENDING">PENDING</option>
                                <option value="STARTED">STARTED</option>
                                <option value="FINISHED">FINISHED</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="end" class="form-label">Building</label>
                            <select data-choices  class="form-select mb-3" aria-label="Default select example" name="building" required>
                                <option selected="">Select a building</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}">{{ $building->id }} - {{ $building->name }} ({{$building->number}})</option>
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