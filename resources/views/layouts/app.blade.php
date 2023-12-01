<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- <a class="navbar-brand" href="{{ url('/') }}">Your App Name</a> -->
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            
            @if(auth()->check())
                    <li class="nav-item {{ Request::is('courses*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                    </li>

            @endif
        </ul>

        <!-- Right-aligned links -->
        <ul class="navbar-nav ml-auto">
            @if(auth()->check())
                @if(auth()->user()->isAdmin())
                    <!-- Admin-specific links go here -->
                @elseif(auth()->user()->isTeacher())
                    <!-- Teacher-specific links go here -->
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="container mt-3">
    @yield('content')
</div>

</body>
</html>
