<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>IndoJuni</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/app/xyXVxK19116nI6TPT5KF.png') }}" />
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .nav-link {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 fixed-top px-3"
            style="background: linear-gradient(180deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.25) 50%, rgba(255,255,255,0) 100%);  ">
            <div class="col-md-3 mb-2 mb-md-0 align-items-center">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="{{ asset('images/app/xyXVxK19116nI6TPT5KF.png') }}" alt="logo" height="55">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 ">
                <li><a href="#" class="nav-link px-2"
                        style="{{ request()->is('/') ? 'text-decoration:underline' : '' }}">Home</a></li>
                <li><a href="#" class="nav-link px-2  "
                        style="{{ request()->is('catalogue') ? 'text-decoration:underline' : '' }}">Catalogue</a>
                </li>
                <li><a href="#" class="nav-link px-2"
                        style="{{ request()->is('p*') ? 'text-decoration:underline' : '' }}">Pricing</a>
                </li>
                <li><a href="#" class="nav-link px-2"
                        style="{{ request()->is('fa*') ? 'text-decoration:underline' : '' }}">FAQs</a></li>
                <li><a href="#" class="nav-link px-2"
                        style="{{ request()->is('ab*') ? 'text-decoration:underline' : '' }}">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                @auth
                @else
                    <button type="button" class="btn btn-outline-primary me-2">Login</button>
                    <button type="button" class="btn btn-primary">Sign-up</button>
                @endauth
            </div>
        </header>
    </nav>

    <div class="d-flex h-100 text-center"
        style="padding-top:6rem; background-image:url({{ asset('images/app/ZiO1i56gJbwduUeaoQDW.jpg') }}); background-repeat:no-repeat; background-size:cover; background-position:center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <main class="px-3 align-items-center mt-auto">
                <h1 class="text-white " style="text-shadow:0 0 50px black;">IndoJuni</h1>
                <p class="lead text-white fw-semibold" style="text-shadow:0 0 20px black;">Mudah dan Cepat, Belanja di
                    IndoJuni!
                </p>
                <p class="lead" style="text-shadow: unset">
                    <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Pelajari Lebih
                        Lanjut</a>
                </p>
            </main>
            <div class="container mt-auto">
                <div class="container">
                    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top ">
                        <div class="col-md-4 d-flex align-items-center">
                            <a href="https://getbootstrap.com/" target="_blank"
                                class="mb-3 me-2 mb-md-0 text-decoration-none lh-1">
                                <i class="fa-brands fa-bootstrap" style="color: rgba(255,255,255,1);"></i>
                            </a>
                            <span class="mb-3 mb-md-0 text-white">&copy; 2023 IndoJuni, Inc</span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
