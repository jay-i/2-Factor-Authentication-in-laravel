<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2 Factor Authentication</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            @guest
                <li>
                    <a href="{{ ('/') }}" class="p-3">2FA System</a>
                </li>
            @endguest
           
        </ul>

        <ul class="flex items-center">
            @auth
                <li>
                    {{ Auth::user()->name }}
                </li>

                <li class="mr-2">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout').submit()">
                    Logout</a>
                    <form action="{{ route('logout') }}" method="post" id="logout" style="display: none">
                        @csrf
                    </form>
                </li>
                {{-- <li>
                    <a href="{{ route('logout') }}" class="p-3">Logout</a>
                </li> --}}
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
            
            
            
        </ul>
    </nav>
    @yield('content')
</body>
</html>