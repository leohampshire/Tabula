<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('user.includes.head')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        @include('user.includes.preview')


        @yield('content')

        @include('user.includes.footer-class')
        
    </body>

</html>