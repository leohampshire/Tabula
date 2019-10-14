<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- INCLUIR ABAIXO PARA A CONFIGURAÇÃO DE SEO: - @yield('title')-->
<title>{{ config('app.name') }}</title>
<meta name="description" content="@yield('description')"/>
  <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@yield('head')
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{ asset('images/favicon/manifest.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.png')}}">
<meta name="theme-color" content="#ffffff">

  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
 
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}?ver=2.0.0">

<!--Google Login API-->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<meta name="google-signin-client_id" content="612767872532-243ng3sc0chq0sp70s87eocjeoem7k5p.apps.googleusercontent.com">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140314883-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140314883-1');
</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5c8ba67f101df77a8be2c191/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->   