@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Add New Patient
    @endcomponent
    <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-link', ['name' => 'dashboard', 'link' => '/pharmacist-dashboard'])@endcomponent

            <form method="POST" action="{{ route('patients.store') }}" aria-label="{{ __('Patients') }}">
                @csrf
                @component('components.tabs-container')

                @slot('links')
                <li class="nav-item">
                    <a class="nav-link active" href="#">Patient Details</a>
                </li>

                @endslot

                <div class="tab-pane fade show active" id="pharmacies" role="tabpanel">

                    @include('partials.forms._user-credentials')

                </div>

                @endcomponent

                <input type="submit" class="btn btn-primary mb-20" value="{{ __('Save') }}"></input>
            </form>

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
