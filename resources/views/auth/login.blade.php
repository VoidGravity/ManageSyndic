@extends('layouts.guest', ['pageTitle' => 'Home'])
@section('content')
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden card-bg-fill border-0 card-border-effect-none">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="index.html" class="d-block">
                                                <x-authentication-card-logo />
                                            </a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <i class="ri-double-quotes-l display-4 text-success"></i>
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                        data-bs-slide-to="0" class="active" aria-current="true"
                                                        aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner text-center text-white pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">"Fantastic app! Manage Syndic excels in every aspect. The code is clean, the design is elegant, and customization is a breeze. It has significantly improved our property management process. Thanks very much!"</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">"Manage Syndic is a game-changer! The app's clean code ensures smooth performance, while its modern design enhances usability. Customizing it to fit our specific property management needs has been a breeze. Highly impressed and grateful for such a valuable tool!"</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">"Absolutely fantastic! Manage Syndic exceeds expectations with its clean, efficient code and intuitive interface. It's incredibly versatile, allowing us to tailor it precisely to our property management workflows. This app has significantly improved our efficiency and organization. A big thank you to the developers for creating such a valuable tool!"</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to {{config('app.name')}}.</p>
                                    </div>
                                    <x-validation-errors class="mb-4" />

                                    @session('status')
                                        <div class="mb-4 font-medium text-sm text-success">
                                            {{ $value }}
                                        </div>
                                    @endsession

                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <x-label for="email" value="{{ __('Email') }}" />
                                                <x-input id="email" class="block mt-1 w-full" placeholder="Enter email"
                                                    type="email" name="email" :value="old('email')" required autofocus
                                                    autocomplete="username" />
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end" style="z-index: 9; position: relative;">
                                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                        password?</a>
                                                </div>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <x-label for="password" value="{{ __('Password') }}" />
                                                    <x-input id="password" class="block mt-1 w-full" type="password"
                                                        name="password" required autocomplete="current-password" />
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" name="remember" type="checkbox" value=""
                                                    id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Remember
                                                    me</label>
                                                <label for="remember_me" class="flex items-center">
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy;
                            <script>document.write(new Date().getFullYear())</script> {{config('app.name')}}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
@endsection