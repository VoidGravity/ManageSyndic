@extends('layouts.app', ['pageTitle' => 'Edit resident'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit resident</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <form action="{{ route('dashboard.resident.update', $resident) }}" method="POST">
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
                                <label for="placeholderInput" class="form-label">First name</label>
                                <input type="text" class="form-control" id="placeholderInput" name="first_name" value="{{ old('first_name', $resident->user->first_name) }}"
                                    placeholder="First name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="placeholderInput" name="last_name" value="{{ old('last_name', $resident->user->last_name) }}"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Username</label>
                                <input type="text" class="form-control" id="placeholderInput" value="{{ old('username',$resident->user->username)}}"
                                    disabled placeholder="Unique username" name="username">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="iconrightInput" class="form-label">Email:</label>
                                <div class="form-icon right">
                                    <input type="email" class="form-control form-control-icon" id="iconrightInput" value="{{ old('email',$resident->user->email)}}"
                                        placeholder="example@gmail.com" name="email">
                                    <i class="ri-mail-unread-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="apartment-number" class="form-label">Apartment number</label>
                                <input type="number" class="form-control" id="apartment-number" value="{{ old('apartment_number',$resident->apartment_number)}}"
                                     placeholder="Apartment number" name="apartment_number">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="monthly-contrubtion" class="form-label">Monthly contrubtion:</label>
                                <div class="form-icon right">
                                    <input type="number" class="form-control" id="monthly-contrubtion" value="{{ old('monthly_contrubtion',$resident->monthly_contrubtion)}}"
                                     placeholder="0" name="monthly_contrubtion">
                                    <i class="ri-mail-unread-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="iconrightInput" class="form-label">Building:</label>
                                <select data-choices  class="form-select mb-3" aria-label="Default select example" name="building" value="{{ old('building', $resident->building->id) }}">
                                    <option selected="">Select a building </option>
                                    @foreach ($buildings as $building)
                                        <option value="{{$building->id}}"
                                            @if($building->id == old('building', $resident->building->id)) selected @endif                                        
                                        >{{$building->id}} - {{ $building->name }} (N°
                                            {{ $building->number }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleInputpassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputpassword" name="password" value="{{ old('password') }}"
                                >
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleInputpassword" class="form-label">Password confirmation</label>
                                <input type="password" class="form-control" id="exampleInputpassword" value="{{ old('password_confirmation') }}"
                                    name="password_confirmation">
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