<!-- Sidebar wrapper start -->
<nav class="sidebar-wrapper">


    <!-- Sidebar brand starts -->
    <div class="brand">
        <a href="{{ route('wall') }}" class="logo">
            <img src="/storage/logo/white-brand.png" class="d-none d-md-block me-4" alt="Ruby Admin Dashboard"/>
            <img src="/storage/logo/white-brand.png" class="d-block d-md-none me-4" alt="Ruby Admin Dashboard"/>
        </a>
    </div>
    <!-- Sidebar brand ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebar-menu">
        <div class="sidebarMenuScroll">
            <ul>
                <li @if (Route::currentRouteName() == 'control.dashboard') class="active" @endif>
                    <a href="{{ route('control.dashboard') }}">
                        <i class="bi bi-bar-chart-line"></i>
                        <span class="menu-text">{{ __('control.sidebar.dashboard') }}</span>
                    </a>
                </li>

                <li @if (Route::currentRouteName() == 'control.persons.list') class="active" @endif>
                    <a href="{{ route('control.persons.list') }}">
                        <i class="bi bi-people"></i>
                        <span class="menu-text">{{ __('control.sidebar.persons') }}</span>
                    </a>
                </li>

                @can('viewAny', \App\Models\User::class)
                    <li @if (Route::currentRouteName() == 'control.users.list') class="active" @endif>
                        <a href="{{ route('control.users.list') }}">
                            <i class="bi bi-shield-lock"></i>
                            <span class="menu-text">{{ __('control.sidebar.users') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
    <!-- Sidebar menu ends -->

</nav>
<!-- Sidebar wrapper end -->
