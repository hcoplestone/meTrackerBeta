@extends('layouts.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Title -->
        @component('components.title')
           Admin Dashboard
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
                <a class="nav-link active" href="#">All Pharmacies</a>
            </li>
            <div class="nav-item">
                <a href="/admin/pharmacies/create" class="nav-link">
                    <i class="fa fa-plus mr-5"></i>
                    Add Pharmacy
                </a>
            </div>
            @endslot

            <div class="tab-pane fade show active" id="pharmacies" role="tabpanel">
                <div class="font-size-h3 font-w600 py-30 mb-20 text-center">
                    <span class="text-primary font-w700">{{ $pharmacies->total() }}</span> {{ str_plural('pharmacy', $pharmacies->total()) }} are signed up in total
                </div>

                @if($pharmacies->total())
                <table class="table table-striped table-borderless table-hover table-vcenter mb-20">
                    <thead class="thead-light">
                    <tr>
                        <th class="d-none d-sm-table-cell text-center" style="width: 40px;">#</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Telephone</th>
                        <th class="d-none d-lg-table-cell" style="width: 15%;">Access</th>
                        <th class="text-center" style="width: 80px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pharmacies as $pharmacy)
                    <tr>
                        <td class="d-none d-sm-table-cell text-center">
                            <span class="badge badge-pill badge-primary">{{ $pharmacy->id }}</span>
                        </td>
                        <td class="font-w600">
                            <a href="/admin/pharmacies/{{ $pharmacy->id }}">{{ $pharmacy->name }}</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $pharmacy->telephone }}
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

                {{ $pharmacies->links() }}
            </div>

            @endcomponent

        </div>
        <!-- END Content -->

    </main>
    <!-- END Main Container -->

@endsection
