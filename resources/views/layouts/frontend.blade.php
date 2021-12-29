<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;700;800&display=swap" rel="stylesheet">
        <style>
            :root {
                --primary-color: #10B981;
                --primary-color-rgb: rgba(#92afa6, 0.4);
                --primary-color-hover: #92afa6;
                --primary-font: 'Poppins';
            }

        </style>
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link media="all" type="text/css" rel="stylesheet" href="{{ asset('home/css/language.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
        <link media="all" type="text/css" rel="stylesheet"
            href="{{ asset('home/librairies/owl-carousel/owl.carousel.min.css') }}">
        <link media="all" type="text/css" rel="stylesheet"
            href="{{ asset('home/librairies/owl-carousel/owl.theme.default.css') }}}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ asset('home/css/style.css') }}">
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/bootstrap/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('home/librairies/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('home/librairies/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ asset('vendor/izitoast/iziToast.min.css') }}">
        @stack('styles')
    </head>
    <body>
        @include('frontend.header')
        <div id="app">
        @yield('content')
        </div>
        @include('frontend.footer')
        <script src="{{ asset('home/librairies/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('home/js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('home/js/components.js') }}" type="text/javascript"></script>
        <script src="{{ asset('home/js/language.js') }}" type="text/javascript"></script>
        <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" defer=""></script>
        @routes
        <script src="{{ asset('vendor/izitoast/iziToast.min.js') }}"></script>
        @include('partials.toastr')
        <script>
            $(document).on('click', '.add-to-wishlist', function(e){
                e.preventDefault();
                el = $(this);
                propertyId = el.data('id');
                //el.removeClass('add-to-wishlist').addClass('remove-from-wishlist');
                $.ajax({
                    url: route('wishlist.add', propertyId),
                    method: "POST",
                    success: function(resp){
                        el.removeClass('add-to-wishlist').addClass('remove-from-wishlist');
                        el.find('i').removeClass('far fa-heart').addClass('fas fa-heart');
                        $('.wishlist-count').text(resp);

                        iziToast.success({
                            title: 'Success',
                            message: "{{ __('Property added to your wishlist') }}",
                            position: 'topRight'
                        });
                    },
                    error: function(resp){
                        console.log(resp);
                    }
                });
            });


            $(document).on('click', '.remove-from-wishlist', function(e){
                e.preventDefault();
                el = $(this);
                propertyId = el.data('id');
                $.ajax({
                    url: route('wishlist.remove', propertyId),
                    method: "POST",
                    success: function(resp){
                        el.removeClass('remove-from-wishlist').addClass('add-to-wishlist');
                        el.find('i').removeClass('fas fa-heart').addClass('far fa-heart');

                        $('.wishlist-count').text(resp);

                        iziToast.success({
                            title: 'Success',
                            message: "{{ __('Property removed from your wishlist') }}",
                            position: 'topRight'
                        });
                    },
                    error: function(resp){
                        console.log(resp);
                    }
                });
            });

            $(document).ready(function(){
                var el = $('.wishlist-count');
                if(el){
                    $.ajax({
                        url: route('wishlist.count'),
                        success: function(resp){
                            el.text(resp);
                        }
                    });
                }
            });

            $(document).ready(function(){
                $.ajax({
                    url: route('wishlist.all'),
                    success: function(resp){

                        $('.add-to-wishlist').each(function(){

                            for(elt of resp){
                                if(elt == $(this).data('id')){
                                    $(this).removeClass('add-to-wishlist').addClass('remove-from-wishlist');
                                    $(this).find('i').removeClass('far fa-heart').addClass('fas fa-heart');
                                }
                            }

                        });
                    }
                });
            });
        </script>
        @stack('scripts')
    </body>
</html>
