@extends('layout.control')

@section('icon')
    <i class="bi bi-tag-fill"></i>
@endsection

@section('title')
    <h5>{{ $tag ? __('control.tags.edit_tag') : __('control.tags.create_tag') }}</h5>
@endsection

@section('content')
    <div class="row gx-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $tag ? route('control.tags.update', $tag) : route('control.tags.save') }}"
                          method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <label class="form-label" for="name">{{ __('control.common.name') }}</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                       value="{{ $tag?->name }}"/>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-check-lg me-1"></i>
                            {{ __('control.common.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
