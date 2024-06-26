@extends('layouts.app')

@php
    $route = Route::current()->getName();
    $route = explode('.', $route);
@endphp

@if ($route[1] == 'create')
    @section('content')
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>{{ __('Add Customer') }}</h2>
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
                            <h2>{{ __('Add Customer') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-style-3 mb-30">
                <div class="card-content">
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            @foreach ($fields as $field)
                                @if (!in_array($field, ['id', 'uuid', 'create_by', 'delete_by','update_by','created_at','updated_at','deleted_at']))
                                    <div class="col-6">
                                        <div class="input-style-1">
                                            @php
                                                $label = str_replace('_', ' ', $field);
                                                $label = ucwords($label);
                                            @endphp
                                            <label for="{{ $field }}">{{ $label }}</label>
                                            <input class="{{ $errors->has($field) ? 'form-control is-invalid' : 'form-control form-control-sm' }}"
                                                type="{{ $field == 'po_date' ? 'date' : 'text' }}"
                                                name="{{ $field }}" id="{{ $field }}"
                                                value="{{ old($field) }}"
                                                @if ($field == 'kode_customer')
                                                    readonly placeholder="Generate By System"
                                                @elseif ($field == 'po_date')
                                                    data-mdb-inline="true"
                                                @else
                                                    placeholder="{{ $label }}"
                                                @endif required>
                                            @error($field)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-12">
                                <button type="submit" class="main-btn btn-sm success-btn" data-log-request="true">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@elseif ($route[1] == 'show')
    @section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __($route[1].' Customer') }}</h2>
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
                        <h2>{{ __($route[1].' Customer') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <form action="{{ route($route[0].'.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                            @foreach ($fields as $field)
                                @if (!in_array($field, ['id', 'uuid', 'create_by', 'delete_by','update_by','created_at','updated_at','deleted_at']))
                                    <div class="col-6">
                                        <div class="input-style-1">
                                            @php
                                                $label = str_replace('_', ' ', $field);
                                                $label = ucwords($label);
                                                $date = ($data->$field) ? date('Y-m-d', strtotime(str_replace('-', '/', $data->$field))) : '';
                                            @endphp
                                            <label for="{{ $field }}">{{ $label }}</label>
                                            <input readonly value="{{ $data->$field }}" class="{{ $errors->has($field) ? 'form-control is-invalid' : 'form-control form-control-sm' }}"
                                                type="text"
                                                name="{{ $field }}" id="{{ $field }}"
                                                value="{{ $date }}"
                                                @if ($field == 'kode_customer')
                                                    readonly placeholder="Generate By System"
                                                @elseif ($field == 'po_date')
                                                    data-mdb-inline="true"
                                                @else
                                                    placeholder="{{ $label }}"
                                                @endif required>
                                            @error($field)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @if ($route[1] != 'show')
                            <div class="col-12">
                                <button type="submit" class="main-btn btn-sm success-btn" data-log-request="true">Submit</button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
@elseif ($route[1] == 'edit')
    @section('content')
        {{-- Edit --}}
    @endsection
@else
    @section('content')
    @endsection
@endif
