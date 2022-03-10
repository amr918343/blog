<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- amr --}}
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="navbar-brand" href="{{ url('/profile') }}">
                            Profile
                        </a>
                    </div>

                    <div class="dropdown nav-button notifications-button hidden-sm-down">

                        <a class="btn btn-secondary dropdown-toggle" id="notification_counter" href="#" id="notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i id="notificationsIcon" class="fa fa-bell" aria-hidden="true"></i>
                            
                        </a>

                        <!-- NOTIFICATIONS -->
                        <div id="notification_container" class="dropdown-menu notification-dropdown-menu"
                            aria-labelledby="notifications-dropdown">
                            <h6 class="dropdown-header">Notifications</h6>

                            <!-- CHARGEMENT -->
                            @foreach (App\Models\PostNotification::latest()->take(3)->get() as $notification)
                                @if (auth()->user()->id !== $notification->user_id)
                                    <a id="notificationAucune" class="dropdown-item dropdown-notification"
                                        href="{{ route('post.show', $notification->slug) }}">
                                        <p class="notification-solo text-center">{{ $notification->name }} shared a post
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                            <!-- AUCUNE NOTIFICATION -->


                        </div>

                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
