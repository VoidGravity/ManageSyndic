@extends('layouts.app', ['pageTitle' => 'Add new contribution'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add new contribution</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                @if($residents->count() == 0 || $syndics->count() == 0)
                    <div class="alert alert-info" role="alert">
                        <strong>This Page depends on resident and syndic</strong>, To be able to add a contribution, add a resident and syndic first.
                    </div>
                @endif
                <form action="{{ route('dashboard.admin.contribution.update', $contrubtion) }}" method="post">
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
                                <label for="placeholderInput" class="form-label">Price</label>
                                <input type="number" class="form-control" id="placeholderInput" name="price" placeholder="0.00" required value="{{ old('price', $contrubtion->price) }}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required value="{{ old('date', $contrubtion->date) }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="end" class="form-label">Resident</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="resident" required value="{{ old('resident', $contrubtion->resident->id) }}">
                                <option selected="">Select a resident</option>
                                @foreach ($residents as $resident)
                                    <option value="{{ $resident->id }}" @if($resident->id == old('resident', $contrubtion->resident->id)) selected @endif>{{ $resident->id }} - {{ $resident->user->first_name }} {{$resident->user->last_name }} (App N° {{$resident->apartment_number }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="end" class="form-label">Syndic</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="syndic" required value="{{ old('syndic', $contrubtion->syndic->id) }}">
                                <option selected="">Select a syndic</option>
                                @foreach ($syndics as $syndic)
                                    <option value="{{ $syndic->id }}" @if($syndic->id == old('syndic', $contrubtion->syndic->id)) selected @endif>{{ $syndic->id }} - {{ $syndic->user->first_name }} {{$syndic->user->last_name }} (B:{{$syndic->building->name}} N°{{$syndic->building->number}})</option>
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