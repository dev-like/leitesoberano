<!DOCTYPE html>
<html lang="pt-br">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139155683-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-139155683-1');
  </script>

    <!-- Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('metatags')
    <meta name="author" content="Like Publicidade">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}">


    <!-- Title Page-->
    <title>{{$empresa->nomefantasia}}</title>

    <!-- Fonts e Animations -->
    <link rel="stylesheet" href="{{ asset('theme/css/lib/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/animates.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/fonts/fonts.css') }}">

    <!-- Styles Sheets -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/footer.css') }}">

    @yield('stylesheet')

    <!-- JS Library's -->
    <script src="{{ asset('theme/js/lib/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/js/lib/slick.js') }}" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js" charset="utf-8"></script>
    @yield('jslibrary')
    <!-- Hotjar Tracking Code for https://www.leitesoberano.com.br/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1489036,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>
<body>

    @include('pages.partials.loader')

    @yield('body')

    @yield('script')

</body>
</html>
