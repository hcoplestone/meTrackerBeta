@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Add New Pharmacist
        @slot('secondary')
           <h2 class="h4 text-muted font-w300 mb-0">{{ $pharmacy->name }}</h2>
        @endslot
        @endcomponent
        <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-link', ['name' => 'pharmacy', 'link' => '/admin/pharmacies/' . $pharmacy->id])@endcomponent

            <form method="POST" action="{{ route('pharmacies.pharmacists.store', $pharmacy->id) }}" aria-label="{{ __('Pharmacists') }}">
                @csrf
                @component('components.tabs-container')

                @slot('links')
                <li class="nav-item">
                    <a class="nav-link active" href="#">Pharmacist Credentials</a>
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
