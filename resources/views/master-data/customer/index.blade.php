@extends('layouts.app')

@section('content')
    <div class="title-wrapper">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Dashboard') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card-styles">
        {{-- Customer Wrapper Title --}}
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
        <div class="card-style-1 mb-30">
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-hover" style="border-radius: 8px;">
                        <thead>
                            <tr style="border-radius: 8px;">
                                @foreach ($fields as $field)
                                    <th class="text-center">{{ ucwords(str_replace('_', ' ', $field)) }}</th>
                                @endforeach
                                    <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center; margin: 5px; font-size: 12px">
                            <tr>
                                <td>Data 1</td>
                                <td>Data 2</td>
                                <td>Data 3</td>
                                <td>Data 4</td>
                                <td>Data 5</td>
                                <td>Data 6</td>
                                <x-ved-btn />
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
