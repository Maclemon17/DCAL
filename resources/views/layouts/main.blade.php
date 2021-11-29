<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        
        @include('partials._navBar')
        
        @yield('content')
        

        <div id="footer">
            @include('partials._footer')
        </div>

        @include('partials._javascript')
    </body>
</html>