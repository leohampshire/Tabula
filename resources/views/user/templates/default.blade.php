<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('user.includes.head')
    </head>

    <body>
        <div class="wrapper">
	        @include('user.includes.header')

	        @yield('content')

	        @include('user.includes.modals')
	    </div>
	        
	    @include('user.includes.footer')
        
    </body>

</html>