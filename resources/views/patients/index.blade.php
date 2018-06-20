@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        {{ $pharmacy->name }}
        @slot('secondary')
        <h2 class="h4 text-muted font-w300 mb-0">You are currently logged in as
            <strong>{{ auth()->user()->name }}</strong>.</h2>
    @endslot
    @endcomponent
    <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.tabs-container', ['disabled' => true])

            @slot('links')
            <li class="nav-item">
                <a class="nav-link active" href="#">Diary</a>
            </li>
            <div class="nav-item">
                <a href="/patients/diary-entries/create" class="nav-link">
                    <i class="fa fa-plus mr-5"></i>
                    Add Diary Entry
                </a>
            </div>
            @endslot

            <div class="tab-pane fade show active" id="diaryentries" role="tabpanel">

                @if($diaryEntries->total())
                    @include('partials.display._diary-entry-table', ['diaryEntries' => $diaryEntries, 'linkPrefix' => '/patients/diary-entries'])
                    {{ $diaryEntries->links() }}
                @else
                    <div class="alert alert-danger mb-0">
                        You have not made any diary entries yet.
                    </div>
                @endif
            </div>

            @endcomponent

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
