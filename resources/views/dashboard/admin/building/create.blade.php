@extends('layouts.app', ['pageTitle' => 'Add new building'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add new building</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                @if($syndics->count() == 0)
                    <div class="alert alert-info" role="alert">
                        <strong>This Page depends on syndics</strong>, To be able to add a building, add a syndic first.
                    </div>
                @endif
                <form action="{{ route('dashboard.admin.building.save') }}" method="post">
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
                                <label for="placeholderInput" class="form-label">Name</label>
                                <input type="text" class="form-control" id="placeholderInput" name="name"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Number</label>
                                <input type="number" class="form-control" id="placeholderInput" name="number"
                                    placeholder="Number">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Address</label>
                                <input type="text" class="form-control" id="placeholderInput" placeholder="Address"
                                    name="address">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="iconrightInput" class="form-label">Syndic:</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="syndic">
                                    <option selected="">Select a syndic </option>
                                    @foreach ($syndics as $syndic)
                                        <option value="
                                        {{$syndic->id}}
                                        ">{{$syndic->id}} - {{ $syndic->user->first_name }} {{ $syndic->user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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