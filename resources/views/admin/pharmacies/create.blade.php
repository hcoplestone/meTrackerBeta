@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
        Add New Pharmacy
    @endcomponent
    <!-- END Title -->

        <!-- Page Content -->
        <div class="content">

            @component('components.back-to-admin-dashboard')@endcomponent

            <form method="POST" action="{{ route('pharmacies.store') }}" aria-label="{{ __('Pharmacies') }}">
                @csrf
                @component('components.tabs-container')

                @slot('links')
                <li class="nav-item">
                    <a class="nav-link active" href="#">Pharmacy Details</a>
                </li>

                @endslot

                <div class="tab-pane fade show active" id="pharmacies" role="tabpanel">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>

                        <input id="name" type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="telephone">{{ __('Telephone') }}</label>

                        <input id="telephone" type="tel"
                               class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone"
                               value="{{ old('telephone') }}" required>

                        @if ($errors->has('telephone'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address">{{ __('Address') }}</label>

                        <textarea id="address" type="text"
                                  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                  required>{{ old('address') }}</textarea>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                @endcomponent

                <input type="submit" class="btn btn-primary" value="{{ __('Save') }}"></input>
            </form>

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
