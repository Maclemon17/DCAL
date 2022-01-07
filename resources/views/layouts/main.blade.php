<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        
        @include('partials._navBar')

        @yield('content')

    
        <div id="footer">
            @if (Request::is('/'))
                @include('partials._footer')
            
            @endif
        </div>

        @include('partials._javascript')
    </body>
</html>