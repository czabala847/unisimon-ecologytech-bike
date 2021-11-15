<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ecologitech Bike</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    {{-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

    </div> --}}

    <div id="root">

        <div class="Home" id="Home">

            <header class="Header" id="Header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="/">Ecologitech Bike</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Inicio <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#servicios">Servicios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#acerca-de">Acerca de</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contactanos">Contactanos</a>
                                </li>
                                @if (Route::has('login'))
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                                        </li>
                                    @endguest
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

            <section class="Hero min-vh-100 d-flex justify-content-center align-items-center">

                <div class="overlay-texture"></div>
                <div class="overlay-deg"></div>
                <video loop muted autoplay preload="auto">
                    {{-- <source src="{{ asset('assets/videos/production ID_4649767.mp4') }}" type="video/mp4"> --}}
                    <source src="{{ asset('assets/videos/hero.mp4') }}" type="video/mp4">
                    Tu navegador no soporta las etiquetas de video.
                </video>

                <div class="caption">
                    <h1>Bienvenido a<br /> Ecologitech Bike</h1>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam, tempore. Aliquam enim
                        <br />
                        distinctio velit illum sed nesciunt ea nisi error qui perferendis repudiandae, hic iste, maiores
                        provident exercitationem deserunt necessitatibus?
                    </p>
                </div>
            </section>

            <section class="Services py-5" id="servicios">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-5">Servicios</h2>

                            <div class="row">
                                <article class="col-12 col-md-6">
                                    <div class="card p-3 mb-3 mb-md-0 shadow rounded border-0">
                                        <div class="card-body">
                                            <h4 class="my-3">Venta de bicicletas</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, quae
                                                assumenda? Maxime ex eaque dignissimos quas, ipsam aut ut quaerat.

                                            </p>
                                            <button class="btn btn-primary">
                                                Conoce más
                                            </button>

                                            <i class="fas fa-shopping-basket Services__icon"></i>

                                        </div>
                                    </div>
                                </article>
                                <article class="col-12 col-md-6">
                                    <div class="card p-3 shadow rounded border-0">
                                        <div class="card-body">
                                            <h4 class="my-3">Alquiler de bicicletas</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, quae
                                                assumenda? Maxime ex eaque dignissimos quas, ipsam aut ut quaerat.

                                            </p>
                                            <button class="btn btn-secondary">
                                                Conoce más
                                            </button>

                                            <i class="fas fa-calendar-alt Services__icon"></i>
                                        </div>
                                    </div>
                                </article>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="Featured-products py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="my-4">Productos <br />Destacados</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section class="About py-5" id="acerca-de">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="my-4">Acerca de</h2>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. In nam est qui corporis eius
                                officia vel ad, dolores porro accusantium aspernatur error soluta consequuntur cum,
                                reprehenderit, ullam repellat quia sequi.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui voluptatem quaerat labore
                                rem sunt nemo error accusantium autem, eum et excepturi. Dicta minima sunt veniam nobis
                                iusto, excepturi consequatur minus?
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="Contact py-5 bg-light" id="contactanos">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="my-4">¿Necesitas más información?</h2>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <form autocomplete="off">
                                        <div class="form-group">
                                            <label for="nombre">Nombre completo</label>
                                            <input type="text" class="form-control" id="nombre"
                                                placeholder="Benito Martínez">
                                        </div>
                                        <div class="form-group">
                                            <label for="correo">Correo</label>
                                            <input type="email" class="form-control" id="correo"
                                                placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Mensaje</label>
                                            <textarea class="form-control" id="body" rows="3"></textarea>
                                        </div>
                                        <button class="btn btn-primary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="Footer bg-dark py-5 text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="m-0">
                                Ecologitech Bike - Todos los derechos reservados {{ now()->year }}
                            </p>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <script src="https://kit.fontawesome.com/2028b75fa6.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
