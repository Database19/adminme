@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Customer') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
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
                                        <input @error($field) class="form-control is-invalid" @enderror 
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
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
