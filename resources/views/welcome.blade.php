@extends('layouts.app')

@section('css')
    @parent
    <style>
        .overlay-texture {
            background-image: url("https://i.ibb.co/k17z91R/cross-stripes.png")
        }

    </style>
@stop

@section('content')
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
                                    <a href="{{ url('/alquiler') }}" class="btn btn-secondary">
                                        Conoce más
                                    </a>

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

@endsection
