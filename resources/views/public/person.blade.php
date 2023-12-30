@extends('layout.public')

@section('body')
    <div class="container py-3">
        <a href="{{ route('wall') }}" class="btn btn-primary">
            {{ __('person.go_back') }}
        </a>

        <h3 class="mt-3">{{ $person->nickname }}</h3>

        <hr>

        <h5>{{ __('person.description') }}</h5>

        @foreach(explode("\n", $person->description) as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        @if ($person->tags->count() > 0)
            <h5>{{ __('person.tags') }}</h5>

            <div class="row mb-3 g-2">
                @foreach ($person->tags as $tag)
                    <div class="col-auto">
                        <span class="badge badge-lg bg-secondary fs-6">
                            <i class="bi bi-tag-fill"></i>
                            {{ $tag->name }}
                        </span>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($person->photos->count() > 0)
            <h5>{{ __('person.photos') }}</h5>

            <div class="row mb-3 gy-4">
                @foreach($person->photos as $photo)
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

        <div class="position-relative">
            <div class="position-absolute w-100" id="comments" style="margin-top: -5rem; padding-top: 5rem;"></div>
        </div>

        @if ($person->comments->count() > 0 || Auth::user()->can('create', App\Models\Comment::class))
            <h5>{{ __('person.comments') }}</h5>

            <div class="row g-3">
                @can('create', App\Models\Comment::class)
                    <div class="col-12 col-lg-6 order-lg-1">
                        <div class="card sticky-lg-top top-0 top-lg-5rem">
                            <div class="card-body">
                                <form method="post" action="{{ route('comments.create', $person) }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="comment">
                                            {{ __('person.new_comment') }}
                                        </label>
                                        <textarea id="comment" class="form-control" rows="4" name="text"
                                                  placeholder="{{ __('person.new_comment_placeholder') }}"></textarea>
                                    </div>

                                    <button class="btn btn-primary">{{ __('person.submit') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan

                <div class="col-12 @can('create', App\Models\Comment::class) col-lg-6 @endcan order-lg-0">
                    <div class="row gy-3">
                        @foreach ($person->comments as $comment)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="card-title">
                                                    @can('viewNickname', App\Models\Comment::class)
                                                        {{ $comment->user->name }}
                                                    @else
                                                        <span class="text-muted">{{ __('person.hidden') }}</span>
                                                    @endcan
                                                </h6>
                                            </div>

                                            <div class="col-auto">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </div>
                                        </div>

                                        @foreach (explode("\n", $comment->text) as $line)
                                            <p class="card-text">{{ $line }}</p>
                                        @endforeach

                                        @can('delete', $comment)
                                            <form method="post" action="{{ route('comments.remove', $comment) }}">
                                                @csrf

                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash-fill"></i>
                                                    {{ __('person.remove') }}
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
