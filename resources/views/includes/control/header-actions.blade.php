<!-- Header actions container start -->
<div class="header-actions-container">

    <!-- Header profile start -->
    <div class="header-profile d-flex align-items-center">
        <div class="dropdown">
            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                <span class="user-name d-none d-md-block">{{ Auth::user()->name }}</span>
                <span class="avatar">
									<img src="/control/images/users.svg" alt="Admin Panel"/>
									<span class="status online"></span>
								</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                <div class="header-profile-actions">
                    <a href="{{ route('control.users.edit', Auth::user()) }}">
                        {{ __('control.user.profile') }}
                    </a>

                    <a href="#" onclick="logout()">
                        {{ __('control.user.logout') }}
                    </a>

                    <form id="logoutForm" class="d-inline" method="post" action="{{ route('control.auth.logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Header profile end -->

</div>
<!-- Header actions container end -->

<script>
    function logout() {
        document.querySelector('#logoutForm').submit();
    }
</script>
