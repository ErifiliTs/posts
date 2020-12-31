<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body class="bg-gray-300">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/home" class="p-6">Home</a>
            </li>
            <li>
                <a href=" {{ route('dashboard')  }}" class="p-6">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-6">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    {{-- represents the name of ech user stored in database --}}
                    <a href="" class="p-6">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" href="{{ route('logout') }}">Logout</button>
                    </form>
                </li>
            @endauth
            
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-6">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-6">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</body>

</html>