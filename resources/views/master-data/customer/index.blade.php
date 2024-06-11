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
                        <tbody style="text-align: center; margin: 2px; font-size: 12px">
                            @foreach ($data as $item)
                                <tr>
                                    @foreach ($fields as $field)
                                        <td>{{ $item->{$field} }}</td>
                                    @endforeach
                                    <x-ved-btn :id="$item->id" />
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-4">
            {{ $data->links() }}
        </div>
    </div>
@endsection
