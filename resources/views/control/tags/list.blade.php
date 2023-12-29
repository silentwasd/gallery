@extends('layout.control')

@section('icon')
    <i class="bi bi-tag-fill"></i>
@endsection

@section('title')
    <h5>{{ __('control.sidebar.tags') }}</h5>
@endsection

@section('header')
    <div>
        <a href="{{ route('control.tags.create') }}" class="btn btn-primary d-inline-flex align-items-center">
            <i class="bi bi-plus-lg me-1"></i>
            {{ __('control.common.create') }}
        </a>
    </div>
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{ __('control.common.id') }}</th>
            <th scope="col">{{ __('control.common.name') }}</th>
            <th scope="col">{{ __('control.tags.person_count') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tags as $tag)
            <tr>
                <th scope="row" class="align-middle">{{ $tag->id }}</th>
                <td class="align-middle">{{ $tag->name }}</td>
                <td class="align-middle">{{ $tag->persons()->count() }}</td>
                <td class="align-middle">
                    <div class="d-flex" style="gap: 0.5rem;">
                        <a href="{{ route('control.tags.edit', $tag) }}" class="btn btn-sm btn-primary">
                            {{ __('control.common.edit') }}
                        </a>

                        <form class="d-inline" method="post" action="{{ route('control.tags.remove', $tag) }}">
                            @csrf
                            <button class="btn btn-sm btn-primary">{{ __('control.common.remove') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
