<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('user.includes.head')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        @include('admin.includes.preview')


        @yield('content')

        @include('admin.includes.modals')
        
        @include('user.includes.footer-class')
        
    </body>

</html>