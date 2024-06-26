@extends('layouts.app', ['pageTitle' => 'Home'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Residential Buildings</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-home-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="0">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Residents</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="0">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Syndics</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="0">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Contrubtions</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-trophy-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="0">0</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Servicings</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-shake-hands-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="0">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Servicing</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Cost</th>
                                <th scope="col" style="width: 20%;">Start</th>
                                <th scope="col" style="width: 20%;">End</th>
                                <th scope="col">Syndic</th>
                                <th scope="col" style="width: 16%;">Status</th>
                                <th scope="col" style="width: 12%;">Building</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Absternet LLC</td>
                                <td>....</td>
                                <td>
                                    <div class="text-nowrap">$100.1K</div>
                                </td>
                                <td>Sep 20, 2021</td>
                                <td>Sep 20, 2021</td>
                                <td>
                                    <a href="#javascript: void(0);" class="text-body fw-medium">Donald Risher</a>
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-2">Deal Won</span></td>
                                <td>
                                    <a href="#javascript: void(0);" class="text-body fw-medium">Donald Risher</a>
                                </td>
                            </tr>
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <div class="col-xxl-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Balance Overview</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                class="text-muted">Current Year<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Current Year</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body px-0">
                <ul class="list-inline main-chart text-center mb-0">
                    <li class="list-inline-item chart-border-left me-0 border-0">
                        <h4 class="text-primary">$584k <span
                                class="text-muted d-inline-block fs-13 align-middle ms-2">Revenue</span></h4>
                    </li>
                    <li class="list-inline-item chart-border-left me-0">
                        <h4>$497k<span class="text-muted d-inline-block fs-13 align-middle ms-2">Expenses</span>
                        </h4>
                    </li>
                    <li class="list-inline-item chart-border-left me-0">
                        <h4><span data-plugin="counterup">3.6</span>%<span
                                class="text-muted d-inline-block fs-13 align-middle ms-2">Profit Ratio</span></h4>
                    </li>
                </ul>

                <div id="revenue-expenses-charts" data-colors='["--vz-primary", "--vz-secondary"]' class="apex-charts"
                    dir="ltr"></div>
            </div>
        </div><!-- end card -->
    </div>
</div>
@endsection