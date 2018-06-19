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
                        <label for="email">{{ __('Email') }}</label>

                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Password Confirmation') }}</label>

                        <input id="password-confirm" type="password"
                               class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation"
                               required>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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
