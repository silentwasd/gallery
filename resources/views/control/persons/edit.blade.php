@extends('layout.control')

@section('icon')
    <i class="bi {{ $person ? 'bi-person-lines-fill' : 'bi-person-plus-fill' }}"></i>
@endsection

@section('title')
    <h5>{{ $person ? __('control.persons.edit_person') : __('control.persons.create_person') }}</h5>
@endsection

@section('header')
    @if ($person)
        <div class="d-flex gap-3">
            @include('control.persons.state', ['person' => $person, 'class' => 'fs-6'])

            <div>
                <form class="d-inline" method="post" action="{{ route('control.persons.accept', $person) }}">
                    @csrf
                    <button class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-check-lg m-0"></i>
                    </button>
                </form>

                <form class="d-inline" method="post" action="{{ route('control.persons.reject', $person) }}">
                    @csrf
                    <button class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-x-lg m-0"></i>
                    </button>
                </form>

                <form class="d-inline" method="post" action="{{ route('control.persons.wait', $person) }}">
                    @csrf
                    <button class="btn btn-dark btn-sm d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-clock-fill m-0"></i>
                    </button>
                </form>
            </div>
        </div>
    @endif
@endsection

@section('content')
    <div class="row gx-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ __('control.persons.general') }}</div>
                </div>

                <div class="card-body">
                    <form action="{{ $person ? route('control.persons.update', $person) : route('control.persons.save') }}"
                          method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="nickname">{{ __('control.persons.nickname') }}</label>
                            <input class="form-control" id="nickname" name="nickname"
                                   value="{{ $person?->nickname }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">{{ __('control.persons.description') }}</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="10">{{ $person?->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tags">{{ __('control.persons.tags') }}</label>
                            <input class="form-control" id="tags" name="tags"
                                   placeholder="{{ __('control.persons.tag_placeholder') }}"
                                   value="{{ $person?->tags->map(fn(\App\Models\Tag $tag) => $tag->name)->implode(', ') }}" />
                        </div>

                        <button class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-check-lg me-1"></i>
                            {{ __('control.persons.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if ($person)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ __('control.persons.photos') }}</div>
                    </div>

                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-12 col-sm-6 col-md-5 col-lg-3 col-xl-3">
                                <form action="{{ route('control.photos.upload', $person) }}"
                                      method="post" style="border-style: dashed !important;"
                                      class="d-flex flex-column justify-content-center align-items-center border border-2 border-danger h-100 p-3"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control mb-3" name="photo" />
                                    <button class="btn btn-primary d-inline-flex align-items-center">
                                        <i class="bi bi-upload me-2"></i>
                                        {{ __('control.persons.upload') }}
                                    </button>
                                </form>
                            </div>

                            @foreach ($person->photos as $photo)
                                <div class="col-12 col-sm-6 col-md-5 col-lg-3 col-xl-3">
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 end-0">
                                            <form method="post" action="{{ route('control.photos.remove', $photo) }}">
                                                @csrf
                                                <button class="btn btn-primary btn-sm d-flex align-items-center justify-content-center m-2">
                                                    <i class="bi bi-x m-0"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <img src="{{ Storage::disk('public')->url($photo->path) }}"
                                             class="w-100 object-fit-cover" style="height: 250px;" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
