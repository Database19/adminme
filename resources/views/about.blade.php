@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('About us') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="title-wrapper">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>{{ __('Customer') }}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title mb-30">
                        <x-alert-session />
                    </div>
                </div>
                <div class="col-md-12">
                    <x-filter />
                    <x-action-button />
                </div>
            </div>
        </div>
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <p>
                    <x-table-style />
                </p>
            </div>
        </div>
    </div>
@endsection
