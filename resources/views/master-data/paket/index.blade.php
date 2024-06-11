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

    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold">
                    <h2>{{ __('Daftar Paket') }}</h2>
                </div>
                <div>
                    <x-alert-session />
                </div>
            </div>
            <div class="mt-4">
                <x-filter />
                <x-action-button />
            </div>
        </div>
        <div class="p-6">
            <div class="row">
                @php
                    $num = 0;
                @endphp
                @foreach ($paket as $package)
                    <div class="col-md-4 p-4">
                        <div class="bg-white border rounded-lg overflow-hidden">
                            <div class="p-4 border-b">
                                <h3 class="text-xl font-semibold">{{ $package->package_name }}</h3>
                            </div>
                            <div class="p-4">
                                <p><strong>Harga per m²:</strong> {{ $package->price_per_m2 }}</p>
                                <p><strong>Fitur:</strong></p>
                                <ul class="list-disc pl-5">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($package->features as $feature)
                                        @if ($num == 0 && $i > 3)
                                            <li><s>{{ $feature->feature_name }}</s></li>
                                        @elseif ($num == 1 && $i > 9)
                                            <li><s>{{ $feature->feature_name }}</s></li>
                                        @else
                                            <li>{{ $feature->feature_name }}</li>
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @php
                        $num++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
@endsection
