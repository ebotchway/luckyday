<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="icon" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" sizes="192x192" href="{{ asset('img/favicon/android-chrome-192x192.png') }}">
    <link rel="icon" sizes="512x512" href="{{ asset('img/favicon/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LUCKYDAY') }}</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link href="{{ asset('css/construction.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{ asset('vid/bg.mp4') }}" type="video/mp4" />
    </video>

    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h1 class="fst-italic lh-1 mb-4">Our Website is Coming Soon</h1>
                <p class="mb-5">We're working hard to finish the development of this site. Sign up below to
                    receive updates and to be notified when we launch!</p>

                <form id="contactForm" method="post" action="{{ route('contact.us') }}">
                    <!-- Email address input-->
                    <div id="my_send" class="row input-group-newsletter">
                        <div class="col"><input class="form-control" id="email" type="email" name="email"
                                placeholder="Enter email address..." aria-label="Enter email address..." /></div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="submitButton" type="submit">Notify Me!</button>
                        </div>
                    </div>

                    <div id="submitSuccessMessage" style="display: none;">
                        <div class="text-center mb-3 mt-2">
                            <div class="fw-bolder" style="color: white">Form successfully submited</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Social Icons-->
    <div class="social-icons">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-dark m-3" href="https://www.facebook.com/LuckyDay-Tv-Show-107771928330115/"><i
                    class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark m-3" href="https://www.instagram.com/luckydaytvshow/"><i
                    class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script>
        var nextStep = document.querySelector('#submitButton');

        nextStep.addEventListener('click', function(e) {
            e.preventDefault();
            // Hide first view
            document.getElementById('my_send').style.display = 'none';

            // Show thank you message element
            document.getElementById('submitSuccessMessage').style.display = 'block';
        });
    </script>
</body>

</html>
