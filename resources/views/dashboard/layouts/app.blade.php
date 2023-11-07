
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SmS Dashboard</title>
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
])
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button  data-slide="true"  type="submit">
                        <p>Logout</p>
                    </button>
                </form>

            </li>
        </ul>
    </nav>

    @include('dashboard.layouts.leftSidebar')

    @yield('content')

</div>
@yield('footer')

</body>
</html>
