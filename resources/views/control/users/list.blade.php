@extends('layout.control')

@section('icon')
    <i class="bi bi-shield-lock-fill"></i>
@endsection

@section('title')
    <h5>{{ __('control.sidebar.users') }}</h5>
@endsection

@section('header')
    <div>
        <a href="{{ route('control.users.create') }}" class="btn btn-primary d-inline-flex align-items-center">
            <i class="bi bi-plus-lg me-1"></i>
            {{ __('control.users.create') }}
        </a>
    </div>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{ __('control.users.id') }}</th>
                <th scope="col">{{ __('control.users.name') }}</th>
                <th scope="col">{{ __('control.users.email') }}</th>
                <th scope="col">{{ __('control.users.role') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row" class="align-middle">{{ $user->id }}</th>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->role->view() }}</td>
                    <td class="align-middle">
                        <div class="d-flex" style="gap: 0.5rem;">
                            <a href="{{ route('control.users.edit', $user) }}" class="btn btn-sm btn-primary">
                                {{ __('control.users.edit') }}
                            </a>

                            <form class="d-inline" method="post" action="{{ route('control.users.remove', $user) }}">
                                @csrf
                                <button class="btn btn-sm btn-primary">{{ __('control.users.remove') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
