<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand active-on-light" href="#" style="display: none;">
            <img src="/storage/logo/brand.png" height="30" />
        </a>
        <a class="navbar-brand active-on-dark" href="#" style="display: none;">
            <img src="/storage/logo/dark-brand.png" height="30" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() == 'wall') active @endif"
                       href="{{ route('wall') }}">
                        {{ __('navbar.wall') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() == 'send-person.show') active @endif"
                       href="{{ route('send-person.show') }}">
                        {{ __('navbar.send_person') }}
                    </a>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('control.auth.show') }}">
                        {{ __('navbar.login') }}
                    </a>
                </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('control.dashboard') }}">
                            {{ __('navbar.dashboard') }}
                        </a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#" onclick="setTheme(getStoredTheme() == 'light' ? 'dark' : 'light')">
                        <i class="bi bi-brightness-high-fill"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
