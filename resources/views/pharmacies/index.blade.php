@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        {{ $pharmacy->name }}
        @slot('secondary')
        <h2 class="h4 text-muted font-w300 mb-0">You are currently logged in as <strong>{{ auth()->user()->name }}</strong>.</h2>
    @endslot
    @endcomponent
    <!-- END Title -->

    <!-- Page Content -->
    <div class="content">

        @component('components.tabs-container', ['disabled' => true])

        @slot('links')
        <li class="nav-item">
            <a class="nav-link active" href="#">All Patients</a>
        </li>
        <div class="nav-item">
            <a href="/pharmacies/patients/create" class="nav-link">
                <i class="fa fa-plus mr-5"></i>
                Add Patient
            </a>
        </div>
        @endslot

        <div class="tab-pane fade show active" id="patients" role="tabpanel">
            <div class="font-size-h3 font-w600 py-30 mb-20 text-center">
                Your pharmacy has <span class="text-primary font-w700">{{ $patients->total() }}</span> {{ str_plural('patient', $patients->total()) }}
            </div>

            @if($patients->total())
            <table class="table table-striped table-borderless table-hover table-vcenter mb-20">
                <thead class="thead-light">
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 40px;">#</th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell">Email</th>
                    <th class="d-none d-lg-table-cell" style="width: 15%;">Access</th>
                    <th class="text-center" style="width: 80px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td class="d-none d-sm-table-cell text-center">
                            <span class="badge badge-pill badge-primary">{{ $patient->id }}</span>
                        </td>
                        <td class="font-w600">
                            <a href="/pharmacies/patients/{{ $patient->id }}">{{ $patient->name }}</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $patient->email }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif

            {{ $patients->links() }}
        </div>

        @endcomponent

    </div>
    <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
