<!doctype html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("public/asset/frontEnd/slick/slick.css")}}">
        <link rel="stylesheet" href="{{asset("public/asset/frontEnd/slick/slick-theme.css")}}">

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" />

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset("public/asset/frontEnd/css/bootstrap.min.css")}}" />
        <link rel="stylesheet" href="{{asset("public/asset/frontEnd/css/main.css")}}" />


        <!-- Fonts -->

        @yield('title')
    </head>
    <body>


@if(request() -> is("login") || request() -> is("register") || request() -> is("password_reset"))
@include('frontEnd/inclueds/login_or_regist')
@else
<!-- start upper navebare -->
@include('frontEnd/inclueds/UpperNavBar')
<!-- end upper navebare -->

<!-- start lower navebare -->
@include('frontEnd/inclueds/lowerNaveBar')
<!-- end lower navebare -->
@endif









@yield('content')





<!-- start footer -->
@include('frontEnd/inclueds/footer')
<!-- end footer -->






        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <!-- <script src="js/jquery-3.6.0.min.js"></script> -->
        <script src="{{asset("public/asset/frontEnd/js/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("public/asset/frontEnd/js/main.js")}}"></script>
        <script src="{{asset("public/asset/frontEnd/slick/slick.js")}}"></script>
        <!-- Scripts -->
        <script>
            $(document).on('ready', function() {

                $('.center').slick({
                    rtl: true,
                    centerMode: true,
                    centerPadding: '60px',
                    slidesToShow: 3,
                    responsive: [
                        {
                          breakpoint: 768,
                          settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                      }
                    }
                  ]
                });
            });
        </script>
    </body>
</html>
