@extends('layout.public')

@section('body')
    <div class="container py-3">
        @if (session()->has('success'))
            <div class="alert alert-warning">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <form class="card-body" method="post" action="{{ route('send-person.send') }}" enctype="multipart/form-data">
                @csrf

                <h5 class="card-title">
                    {{ __('send-person.send_person') }}
                </h5>

                <div class="mb-3">
                    <label class="form-label" for="nickname">{{ __('send-person.nickname') }} <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control @error('nickname') is-invalid @enderror"
                           id="nickname" name="nickname" value="{{ old('nickname') }}" />
                    @error('nickname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">{{ __('send-person.description') }} <span class="text-danger fw-bold">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description" name="description" rows="10">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="photos">{{ __('send-person.photos') }} <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control @error('photos') is-invalid @enderror"
                           type="file" id="photos" name="photos[]" multiple />
                    @error('photos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary">{{ __('send-person.submit') }}</button>
            </form>
        </div>
    </div>
@endsection
