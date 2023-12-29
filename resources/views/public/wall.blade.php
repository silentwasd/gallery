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

                            @if ($person->photos()->count() > 0)
                                <div class="row mb-3 gy-4">
                                    @foreach($person->photos()->limit(3)->get() as $photo)
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <img src="{{ Storage::disk('public')->url($photo->path) }}"
                                                 class="w-100 object-fit-cover h-md-250" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{ route('person', $person) }}" class="btn btn-primary stretched-link">
                                {{ __('person.open_page') }}
                            </a>
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
