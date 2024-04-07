<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        @include('layouts.partials.sidebar')
        <div id="right-panel" class="right-panel">
            @include('layouts.partials.header')
            @yield('content')
        </div>
        @include('layouts.partials.scripts')
    </body>
</html>


