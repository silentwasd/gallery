@extends('layout.control')

@section('icon')
    <i class="bi {{ $user ? 'bi-person-lines-fill' : 'bi-person-plus-fill' }}"></i>
@endsection

@section('title')
    <h5>{{ $user ? __('control.users.edit_user') : __('control.users.create_user') }}</h5>
@endsection

@section('content')
    <div class="row gx-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $user ? route('control.users.update', $user) : route('control.users.save') }}"
                          method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <label class="form-label" for="name">{{ __('control.users.name') }}</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                       value="{{ $user?->name }}"/>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <label class="form-label" for="email">{{ __('control.users.email') }}</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                       value="{{ $user?->email }}"/>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <label class="form-label" for="password">{{ __('control.users.password') }}</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password"
                                       value=""/>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <label class="form-label" for="role">{{ __('control.users.role') }}</label>
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                    @foreach (\App\Enums\UserRole::cases() as $role)
                                        <option @selected($role->value == $user?->role->value)
                                                value="{{ $role->value }}">
                                            {{ $role->view() }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-check-lg me-1"></i>
                            {{ __('control.users.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
