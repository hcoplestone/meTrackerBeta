@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Pharmacy Details
          @slot('secondary')
             <h2 class="h4 text-muted font-w300 mb-0">{{ $pharmacy->name }}</h2>
         @endslot
        @endcomponent
       <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-admin-dashboard')@endcomponent

            @component('components.tabs-container')

            @slot('links')
            <li class="nav-item">
                <a class="nav-link active" href="#pharmacydetails">Pharmacy Details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#pharmacists">Pharmacists</a>
            </li>
            @endslot

            {{-- Start Pharmacy details tab --}}
            <div class="tab-pane fade show active" id="pharmacydetails" role="tabpanel">
                <b>{{ __('Name') }}</b>
                <p>
                    {{ $pharmacy->name }}
                </p>

                <b>{{ __('Telephone') }}</b>
                <p>
                    {{ $pharmacy->telephone }}
                </p>

                <b>{{ __('Address') }}</b>
                <p>
                    {{ $pharmacy->address }}
                </p>
            </div>
            {{-- End pharmacy details tab --}}

            {{-- Start Pharmacists tab--}}
            <div class="tab-pane fade" id="pharmacists" role="tabpanel">

                @if($pharmacists->count())
                <table class="table table-striped table-borderless table-hover table-vcenter mb-20">
                    <thead class="thead-light">
                    <tr>
                        <th class="d-none d-sm-table-cell text-center" style="width: 40px;">#</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-lg-table-cell" style="width: 15%;">Access</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pharmacists as $pharmacist)
                        <tr>
                            <td class="d-none d-sm-table-cell text-center">
                                <span class="badge badge-pill badge-primary">{{ $pharmacist->id }}</span>
                            </td>
                            <td class="font-w600">
                                {{ $pharmacist->name }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $pharmacist->email }}
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-success">Active</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <div class="alert alert-danger">
                        No pharmacists have been added to this pharmacy yet...
                    </div>
                @endif

                <a href="/admin/pharmacies/{{ $pharmacy->id }}/pharmacists/create" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Add pharmacist
                </a>

            </div>
            {{-- End Pharmacists tab--}}
            @endcomponent

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
