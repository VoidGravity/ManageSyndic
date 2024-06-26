@extends('layouts.app', ['pageTitle' => 'Edit syndic'])
@section('content')
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit syndic</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <form action="{{ route('dashboard.admin.syndic.update', $syndic) }}" method="POST">
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
                                <input type="text" class="form-control" id="placeholderInput" name="first_name" value="{{ old('first_name', $syndic->user->first_name) }}"
                                    placeholder="First name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="placeholderInput" name="last_name" value="{{ old('last_name', $syndic->user->last_name) }}"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="placeholderInput" class="form-label">Username</label>
                                <input type="text" class="form-control" id="placeholderInput" value="{{ old('username',$syndic->user->username)}}"
                                    disabled placeholder="Unique username" name="username">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="iconrightInput" class="form-label">Email:</label>
                                <div class="form-icon right">
                                    <input type="email" class="form-control form-control-icon" id="iconrightInput" value="{{ old('email',$syndic->user->email)}}"
                                        placeholder="example@gmail.com" name="email">
                                    <i class="ri-mail-unread-line"></i>
                                </div>
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