<html>
    <head>
        @yield('header');
    </head>
    <body>
        <h1>ADMIN</h1>
        <a href="/sizes/">Sizes</a>
        <a href="/users/">Users</a>
        <a href="/logout">Logout</a>
        @yield('content');
    </body>
    <footer>
        @yield('footer');
    </footer>
</html>