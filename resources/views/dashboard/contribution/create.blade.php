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
                    @if ($residents->count() == 0 || $syndics->count() == 0)
                        <div class="alert alert-info" role="alert">
                            <strong>This Page depends on resident and syndic</strong>, To be able to add a contribution, add a resident and syndic first.
                        </div>
                    @endif
                    <form action="{{ route('dashboard.contribution.save') }}" method="post">
                        @csrf
                        <x-validation-errors class="mb-4" />

                        @session('status')
                            <div class="mb-4 font-medium text-sm text-success">
                                {{ $value }}
                            </div>
                        @endsession
                        <div id="bulk-wrapper">
                            {{-- Form content --}}
                        </div>
                        <div class="row gy-4 mb-4">
                            <div class="col-xxl-12 col-md-12 text-start">
                                <button type="button" id="bulk-btn" class="btn btn-info waves-effect waves-light">+ Contribution</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var bulkCounter = 0;

    function initializePlugins(counter) {
        // Initialize 'choices' for select elements
        new Choices(document.getElementById(`resident-${counter}`));
        new Choices(document.getElementById(`syndic-${counter}`));

        // Initialize 'flatpickr' for date input
        flatpickr(document.getElementById(`date-${counter}`), {
            dateFormat: "Y-m-d"
        });

        // Add event listener for resident select
        const residentInp = document.getElementById('resident-' + counter);
        const priceInp = document.getElementById('price-' + counter);
        residentInp.addEventListener('change', (e) => {
            residents.find(resident => {
                if (resident.id == e.target.value) {
                    priceInp.value = resident.monthly_contrubtion;
                }
            });
        });
    }

    function addBulkForm(counter) {
        const bulkWrapper = document.getElementById('bulk-wrapper');

        const residents = {!! $residents !!};
        const syndics = {!! $syndics !!};

        const bulkForm = `<div class="row gy-4 mb-4" id="bulk-row-${counter}">
    <div class="col-xxl-3 col-md-6">
        <div>
            <label for="resident-${counter}" class="form-label">Resident</label>
            <select data-choices class="form-select" id="resident-${counter}" name="resident[]">
                <option value="">Select resident</option>
                ${residents.map(resident => `<option value="${resident.id}" data-monthly_contrubtion="${resident.monthly_contrubtion}">${resident.user.first_name} ${resident.user.last_name}</option>`).join('')}
            </select>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div>
            <label for="syndic-${counter}" class="form-label">Syndic</label>
            <select data-choices class="form-select" id="syndic-${counter}" name="syndic[]">
                <option value="">Select syndic</option>
                ${syndics.map(syndic => `<option value="${syndic.id}">${syndic.user.first_name} ${syndic.user.last_name}</option>`).join('')}
            </select>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div>
            <label for="price-${counter}" class="form-label">Price</label>
            <input type="text" class="form-control" id="price-${counter}" name="price[]" value="{{ old('price') }}" placeholder="Price">
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div>
            <label for="date-${counter}" class="form-label">Date</label>
            <input type="date" data-provider="flatpickr" data-date-format="y-m-d" class="form-control" id="date-${counter}" name="date[]" value="{{ old('date') }}" placeholder="Date">
        </div>
    </div>
</div>`;

        bulkWrapper.insertAdjacentHTML('beforeend', bulkForm);

        initializePlugins(counter);
    }

    // Add initial form
    addBulkForm(++bulkCounter);

    // Bulk form button
    const bulkBtn = document.getElementById('bulk-btn');
    bulkBtn.addEventListener('click', (e) => {
        addBulkForm(++bulkCounter);
    });
});
    </script>
@endsection
