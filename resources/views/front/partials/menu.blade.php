<header id="header" class="full-header">
    <style>
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
        </style>

        @php
            $user = Auth::user();
            foreach($user->roles as $role){
                $rn = $role->name;
            }

        @endphp

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.html" class="standard-logo" data-dark-logo="front/images/logo-dark.png"><img src="front/images/logo.png" alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="front/images/logo-dark@2x.png"><img src="front/images/logo@2x.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                            @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    @if ($rn == 'administrator' || $rn == 'editor')
                                        <a href="{{ url('/home') }}" class="mr-2">Profile</a>
                                        <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
                                    @else
                                        <a href="{{ url('/home') }}">Profile</a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"class="mr-2">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->
