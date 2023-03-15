<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>huyentran shop</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('shop/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('shop/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('shop/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    @include('shop.includes.header')

    @include('shop.includes.sidebar')
    @yield('content')



    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                <a class="col single-img" href="{{ route('category_detail', [$category->id]) }}">
                    <img class="img-fluid d-block mx-auto"
                        src="{{ asset('public/assets/category/' . $category->image) }}">
                </a>
                @endforeach


            </div>
        </div>
    </section>


    @include('shop.includes.footer')


    <script src="{{ asset('shop/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('shop/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('shop/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('shop/js/countdown.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('shop/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('shop/js/main.js') }}"></script>
   
    @yield('scripts')

</body>


</html>