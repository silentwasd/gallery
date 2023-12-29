@extends('layout.control')

@section('icon')
    <i class="bi bi-bar-chart-line-fill"></i>
@endsection

@section('title')
    <h5>{{ __('control.sidebar.dashboard') }}</h5>
@endsection

@section('content')
    <div class="row gx-3">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="stats-tile d-flex align-items-center position-relative tile-primary">
                <div class="sale-icon icon-box xl rounded-5 me-3">
                    <i class="bi bi-check2-all font-2x text-primary"></i>
                </div>
                <div class="sale-details text-white">
                    <h6>{{ __('control.dashboard.accepted_persons') }}</h6>
                    <h2 class="m-0">{{ \App\Models\Person::where('state', \App\Enums\PersonState::Accepted)->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="stats-tile d-flex align-items-center position-relative tile-primary">
                <div class="sale-icon icon-box xl rounded-5 me-3">
                    <i class="bi bi-x font-2x text-primary"></i>
                </div>
                <div class="sale-details text-white">
                    <h6>{{ __('control.dashboard.rejected_persons') }}</h6>
                    <h2 class="m-0">{{ \App\Models\Person::where('state', \App\Enums\PersonState::Rejected)->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="stats-tile d-flex align-items-center position-relative tile-primary">
                <div class="sale-icon icon-box xl rounded-5 me-3">
                    <i class="bi bi-hourglass-split font-2x text-primary"></i>
                </div>
                <div class="sale-details text-white">
                    <h6>{{ __('control.dashboard.waiting_persons') }}</h6>
                    <h2 class="m-0">{{ \App\Models\Person::where('state', \App\Enums\PersonState::Waiting)->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="stats-tile d-flex align-items-center position-relative tile-primary">
                <div class="sale-icon icon-box xl rounded-5 me-3">
                    <i class="bi bi-camera-fill font-2x text-primary"></i>
                </div>
                <div class="sale-details text-white">
                    <h6>{{ __('control.dashboard.photos') }}</h6>
                    <h2 class="m-0">{{ \App\Models\Photo::count() }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
