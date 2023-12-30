@extends('layout.control')

@section('icon')
    <i class="bi bi-people-fill"></i>
@endsection

@section('title')
    <h5>{{ __('control.sidebar.persons') }}</h5>
@endsection

@section('header')
    <div>
        <a href="{{ route('control.persons.create') }}" class="btn btn-primary d-inline-flex align-items-center">
            <i class="bi bi-plus-lg me-1"></i>
            {{ __('control.persons.create') }}
        </a>
    </div>
@endsection

@section('content')
    <div class="row gx-3 gy-3">
        @foreach ($persons as $person)
            <div class="col-12 col-lg-4 col-md-6">
                <div class="card h-100 mb-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            {{ $person->nickname }}
                            <sup class="text-muted">#{{ $person->id }}</sup>
                        </div>

                        <div>
                            @include('control.persons.state', ['person' => $person])
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach (explode("\n", Str::limit($person->description, 255)) as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach

                        @if ($person->photos_count > 0)
                            <h6 class="mb-3">Photos: {{ $person->photos_count }}</h6>
                        @endif

                        @if ($person->tags->count() > 0)
                            <h6>Tags:</h6>

                            <div class="row g-2 mb-3">
                                @foreach ($person->tags as $tag)
                                    <div class="col-auto">
                                        <span class="badge bg-secondary fs-6">
                                            <i class="bi bi-tag-fill"></i>
                                            {{ $tag->name }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <a href="{{ route('control.persons.edit', $person) }}" class="btn btn-primary">{{ __('control.persons.edit') }}</a>

                        @can('delete', $person)
                            <form class="d-inline" method="post" action="{{ route('control.persons.remove', $person) }}">
                                @csrf
                                <button class="btn btn-primary">{{ __('control.persons.remove') }}</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
