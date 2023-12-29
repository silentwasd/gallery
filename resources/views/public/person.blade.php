@extends('layout.public')

@section('body')
    <div class="container py-3">
        <a href="{{ route('wall') }}" class="btn btn-primary">
            {{ __('person.go_back') }}
        </a>

        <h3 class="mt-3">{{ $person->nickname }}</h3>

        <h5>{{ __('person.description') }}</h5>

        @foreach(explode("\n", $person->description) as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        @if ($person->photos()->count() > 0)
            <h5>{{ __('person.photos') }}</h5>

            <div class="row mb-3 gy-4">
                @foreach($person->photos()->get() as $photo)
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="#"
                           data-bs-toggle="modal"
                           data-bs-target="#photoModal"
                           data-bs-src="{{ Storage::disk('public')->url($photo->path) }}">
                            <img src="{{ Storage::disk('public')->url($photo->path) }}"
                                 class="w-100 object-fit-cover h-md-250" />
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="photoModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('person.photo') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="w-100" />
                </div>
            </div>
        </div>
    </div>

    <script>
        const photoModal = document.getElementById('photoModal');
        if (photoModal) {
            photoModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const src = button.getAttribute('data-bs-src');

                const image = photoModal.querySelector('.modal-body img');

                image.src = src;
            })
        }
    </script>
@endsection
