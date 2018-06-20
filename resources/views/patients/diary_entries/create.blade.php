@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Add New Diary Entry
         @endcomponent
         <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-link', ['name' => 'dashboard', 'link' => '/patient-dashboard'])@endcomponent

            <form method="POST" action="{{ route('diary-entries.store') }}" aria-label="{{ __('Diary Entries') }}">
                @csrf
                @component('components.tabs-container')

                @slot('links')
                <li class="nav-item">
                    <a class="nav-link active" href="#mood">Mood</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sleep">Sleep</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#exercise">Exercise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#meditation">Meditation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alcohol">Alcohol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#energy">Energy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#behaviours">Behaviours</a>
                </li>
                @endslot

                {{-- Mood tab --}}
                <div class="tab-pane fade show active" id="mood" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" id="moodRadios0" value="0" required>
                        <label class="form-check-label" for="moodRadios0">
                            Happy
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" id="moodRadios1" value="1">
                        <label class="form-check-label" for="moodRadios1">
                            Sensitive
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" id="moodRadios2" value="2">
                        <label class="form-check-label" for="moodRadios2">
                            Sad
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" id="moodRadios3" value="3">
                        <label class="form-check-label" for="moodRadios3">
                            Crisis
                        </label>
                    </div>
                </div>
                {{-- END mood tab --}}

                {{-- Sleep tab--}}
                <div class="tab-pane fade show" id="sleep" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sleep" id="sleepRadios0" value="0">
                        <label class="form-check-label" for="sleepRadios0">
                            0 to 3 hours
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sleep" id="sleepRadios1" value="1">
                        <label class="form-check-label" for="sleepRadios1">
                            3 to 6 hours
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sleep" id="sleepRadios2" value="2">
                        <label class="form-check-label" for="sleepRadios2">
                            6 to 9 hours
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sleep" id="sleepRadios3" value="3">
                        <label class="form-check-label" for="sleepRadios3">
                            9 hours or more
                        </label>
                    </div>
                </div>
                {{-- END sleep tab --}}

                {{-- Exercise tab --}}
                <div class="tab-pane fade show" id="exercise" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exercise" id="exerciseRadios0" value="0">
                        <label class="form-check-label" for="exerciseRadios0">
                            None
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exercise" id="exerciseRadios1" value="1">
                        <label class="form-check-label" for="exerciseRadios1">
                            30 minutes or less
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exercise" id="exerciseRadios2" value="2">
                        <label class="form-check-label" for="exerciseRadios2">
                            30 minutes to 1 hour
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exercise" id="exerciseRadios3" value="3">
                        <label class="form-check-label" for="exerciseRadios3">
                            1 hour or more
                        </label>
                    </div>
                </div>
                {{-- END exercise tab --}}

                {{-- Meditation tab --}}
                <div class="tab-pane fade show" id="meditation" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meditation" id="meditationRadios0" value="0">
                        <label class="form-check-label" for="meditationRadios0">
                            None
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meditation" id="meditationRadios1" value="1">
                        <label class="form-check-label" for="meditationRadios1">
                            5 minutes or less
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meditation" id="meditationRadios2" value="2">
                        <label class="form-check-label" for="meditationRadios2">
                            5 to 30 minutes
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meditation" id="meditationRadios3" value="3">
                        <label class="form-check-label" for="meditationRadios3">
                            30 minutes or more
                        </label>
                    </div>
                </div>
                {{-- END meditation tab --}}

                {{-- Alcohol tab--}}
                <div class="tab-pane fade show" id="alcohol" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alcohol" id="alcoholRadios0" value="0">
                        <label class="form-check-label" for="alcoholRadios0">
                            None
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alcohol" id="alcoholRadios1" value="1">
                        <label class="form-check-label" for="alcoholRadios1">
                            1 unit
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alcohol" id="alcoholRadios2" value="2">
                        <label class="form-check-label" for="alcoholRadios2">
                            2 units
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alcohol" id="alcoholRadios3" value="3">
                        <label class="form-check-label" for="alcoholRadios3">
                            3 units or more
                        </label>
                    </div>
                </div>
                {{-- END Alcohol tab--}}

                {{-- Energy Tab --}}
                <div class="tab-pane fade show" id="energy" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="energy" id="energyRadios0" value="0">
                        <label class="form-check-label" for="energyRadios0">
                            Energised
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="energy" id="energyRadios1" value="1">
                        <label class="form-check-label" for="energyRadios1">
                            Good
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="energy" id="energyRadios2" value="2">
                        <label class="form-check-label" for="energyRadios2">
                            Low
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="energy" id="energyRadios3" value="3">
                        <label class="form-check-label" for="energyRadios3">
                            Exhausted
                        </label>
                    </div>
                </div>
                {{-- END energy tab --}}

                {{-- Behaviours tab--}}
                <div class="tab-pane fade show" id="behaviours" role="tabpanel">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cigarettes" name="cigarettes" value="1">
                        <label class="form-check-label" for="cigarettes">
                            Cigarettes
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="recreational_drugs" name="recreational_drugs" value="1">
                        <label class="form-check-label" for="recreational_drugs">
                            Recreational drugs
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="self_harm" name="self_harm" value="1">
                        <label class="form-check-label" for="self_harm">
                            Self harm
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="other" name="other" value="1">
                        <label class="form-check-label" for="other">
                            Other
                        </label>
                    </div>

                    <p>
                     <h5>Cravings</h5>
                    </p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="craving_sweet" name="craving_sweet" value="1">
                        <label class="form-check-label" for="craving_sweet">
                            Sweet
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="craving_salty" name="craving_salty" value="1">
                        <label class="form-check-label" for="craving_salty">
                            Salty
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="craving_carbohydrate" name="craving_carbohydrate" value="1">
                        <label class="form-check-label" for="craving_carbohydrate">
                            Carbohydrate
                        </label>
                    </div>

                    <p>
                     <h5>Abnormal Behaviours</h5>
                    </p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gambling" name="gambling" value="1">
                        <label class="form-check-label" for="gambling">
                            Gambling
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="over_spending" name="over_spending" value="1">
                        <label class="form-check-label" for="over_spending">
                            Over-spending
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="irritability" name="irritability" value="1">
                        <label class="form-check-label" for="irritability">
                            Irritability
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="anxious" name="anxious" value="1">
                        <label class="form-check-label" for="anxious">
                            Anxious
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mood_swings" name="mood_swings" value="1">
                        <label class="form-check-label" for="mood_swings">
                            Mood swings
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="over_eating" name="over_eating" value="1">
                        <label class="form-check-label" for="over_eating">
                            Over-eating
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hypersexuality" name="hypersexuality" value="1">
                        <label class="form-check-label" for="hypersexuality">
                          Hypersexuality
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="delusions_hallucinations" name="delusions_hallucinations" value="1">
                        <label class="form-check-label" for="delusions_hallucinations">
                            Delusions or hallucinations
                        </label>
                    </div>
                </div>
                {{-- END behaviours tab --}}

                @endcomponent

                <input type="submit" class="btn btn-primary" value="{{ __('Save') }}"></input>
            </form>

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
