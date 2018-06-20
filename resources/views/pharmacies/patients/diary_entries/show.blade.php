@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Diary Entry
        @slot('secondary')
        <h2 class="h4 text-muted font-w300 mb-0">{{ $patient->name }}</h2>
    @endslot
    @endcomponent
    <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-link', ['name' => 'patient', 'link' => '/pharmacies/patients/' . $patient->id])@endcomponent

            @component('components.tabs-container')

            @slot('links')
            <li class="nav-item">
                <a class="nav-link active" href="#diaryentry">Entry Details</a>
            </li>
            @endslot

            {{-- Start diary entries tab--}}
            <div class="tab-pane fade show active" id="diaryentry" role="tabpanel">

                <b>{{ __('Patient Name') }}</b>
                <p>
                    {{ $patient->name }}
                </p>

                @include('partials.display._diary-entry', compact('diaryEntry'))
            </div>
            {{-- End diary entries tab--}}

            @endcomponent

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
