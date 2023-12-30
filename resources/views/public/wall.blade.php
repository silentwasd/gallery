@extends('layout.public')

@section('body')
    <div class="container py-3">
        <div class="row gy-3">
            <div class="col-12">
                <form class="row" action="{{ route('wall') }}" method="get">
                    <div class="col">
                        <input class="form-control" placeholder="{{ __('wall.search') }}"
                               name="search" value="{{ $search }}" />
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary">{{ __('wall.find') }}</button>
                    </div>
                </form>
            </div>

            @foreach ($persons as $person)
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $person->nickname }}</h5>

                            @foreach(explode("\n", Str::limit($person->description, 255 * 2)) as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach

                            @if ($person->tags->count() > 0)
                                <div class="row mb-3 g-2">
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

                            @if ($person->photos_count > 0)
                                <div class="row mb-3 gy-4">
                                    @foreach($person->photos()->limit(3)->get() as $photo)
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <img src="{{ Storage::disk('public')->url($photo->path) }}"
                                                 class="w-100 object-fit-cover h-md-250" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="{{ route('person', $person) }}" class="btn btn-primary stretched-link">
                                        {{ __('person.open_page') }}
                                    </a>
                                </div>

                                @if ($person->photos_count > 0)
                                    <div class="col-auto fs-5">
                                        <i class="bi bi-image me-1"></i>
                                        <span>{{ $person->photos_count }}</span>
                                    </div>
                                @endif

                                @if ($person->comments_count > 0)
                                    <div class="col-auto fs-5">
                                        <i class="bi bi-chat-fill me-1"></i>
                                        <span>{{ $person->comments_count }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12">
                {{ $persons->links() }}
            </div>
        </div>
    </div>
@endsection
