@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Patient Details
          @slot('secondary')
             <h2 class="h4 text-muted font-w300 mb-0">{{ $patient->name }}</h2>
         @endslot
        @endcomponent
       <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-link', ['name' => 'dashboard', 'link' => '/pharmacist-dashboard'])@endcomponent

            @component('components.tabs-container')

            @slot('links')
            <li class="nav-item">
                <a class="nav-link active" href="#patientdetails">Patient Details</a>
            </li>
            @endslot

            {{-- Start patient details tab --}}
            <div class="tab-pane fade show active" id="patientdetails" role="tabpanel">
                <b>{{ __('Name') }}</b>
                <p>
                    {{ $patient->name }}
                </p>

                <b>{{ __('Email') }}</b>
                <p>
                    {{ $patient->email }}
                </p>
            </div>
            {{-- End patient details tab --}}
            @endcomponent

            @component('components.tabs-container')

            @slot('links')
            <li class="nav-item">
                <a class="nav-link active" href="#diaryentriestab">Diary Entries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#moodtrackertab">Mood Tracker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sleeptrackertab">Sleep Tracker</a>
            </li>
            @endslot

            {{-- Start diary entries tab--}}
            <div class="tab-pane fade show active" id="diaryentriestab" role="tabpanel">

                @if($diaryEntries->count())
                    @include('partials.display._diary-entry-table', ['diaryEntries' => $diaryEntries, 'linkPrefix' => '/pharmacies/patients/' . $patient->id . '/diary-entries'])

                    {{ $diaryEntries->links() }}
                @else
                    <div class="alert alert-danger mb-0">
                        {{ $patient->name }} hasn't made any diary entries yet
                    </div>
                @endif

            </div>
            {{-- End diary entries tab--}}

            {{-- Start mood tracker tab--}}
            <div class="tab-pane fade" id="moodtrackertab" role="tabpanel">
                <mood-tracker-graph :mood-data="{{ json_encode($analyticsData) }}"></mood-tracker-graph>
            </div>
            {{-- End mood tracker tab--}}

            {{-- Start sleep tracker tab--}}
            <div class="tab-pane fade" id="sleeptrackertab" role="tabpanel">
                <sleep-tracker-graph :sleep-data="{{ json_encode($analyticsData) }}"></sleep-tracker-graph>
            </div>
            {{-- End sleep tracker tab--}}
            @endcomponent

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
