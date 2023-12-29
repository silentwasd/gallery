<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Meta -->
    <meta name="description" content="Ruby - Responsive Bootstrap 5 Dashboard Template" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="/control/images/favicon.svg" />

    <!-- Title -->
    <title>Control panel</title>

    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="/control/css/bootstrap.min.css" />

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="/control/fonts/bootstrap/bootstrap-icons.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="/control/css/main.min.css" />

    <!-- Login css -->
    <link rel="stylesheet" href="/control/css/login.css" />
</head>

<body class="login-container">
<!-- Login box start -->
<div class="container">
    <form method="post" action="{{ route('control.auth.login') }}">
        @csrf

        <div class="login-box rounded-2 p-5">
            <div class="login-form">
                <a href="{{ route('wall') }}" class="login-logo mb-3">
                    <img src="/storage/logo/red-brand.png" alt="Bootstrap Gallery" />
                </a>
                <h5 class="my-4">{{ __('control.auth.text') }}</h5>

                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('control.auth.email') }}</label>
                    <input id="email" type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror @if (session()->has('error')) is-invalid @endif"
                           placeholder="mail@example.com" />
                    @if (session()->has('error'))
                        <div class="invalid-feedback">
                            {{ session('error') }}
                        </div>
                    @endif
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">{{ __('control.auth.password') }}</label>
                    <input id="password" type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('control.auth.enter_password') }}" />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-grid py-3">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('control.auth.login') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Login box end -->
</body>

</html>
