@extends('layouts.app')

@section('content')
    <section class="min-vh-100 w-100 ViewPrices" id="ViewPrices">
        <form action="" class="w-100 px-3">
            <div class="row min-vh-100">
                <div class="col-12 col-md-6  d-flex align-items-center justify-content-center flex-column ViewPrices__form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <h2 class="text-center">Alquiler de bicicletas</h2>
                                <p class="text-center">
                                    Grandes ofertas. Los Precios Más Bajos. ¡Reserve y ahorre desde ya!
                                </p>
                                {{-- <form action="" class="w-100 px-3 mt-5"> --}}
                                <div class="form-group">
                                    <label for="date-start">Fecha de recogida</label>
                                    <input type="datetime-local" class="form-control"
                                        min="{{ date('Y-m-d') . 'T' . date('H:i') }}" id="date-start" required>
                                </div>
                                <div class="form-group">
                                    <label for="date-end">Fecha de entrega</label>
                                    <input type="datetime-local" class="form-control" id="date-end"
                                        min="{{ date('Y-m-d') . 'T' . date('H:i') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Planes</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        @foreach ($rentalPricing as $rental)
                                            <option value="{{ $rental->id }}">Plan bicicleta -
                                                {{ $rental->category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 ViewPrices__left d-flex align-items-center justify-content-center flex-column">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-10">
                                <div class="card" id="card-info">
                                    <div class="card-header">Bicicletas - </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <p>
                                                <b>Tarifa</b>: <span id="spanPrince"
                                                    class="text-success font-weight-bold"></span> COP
                                                por hora.
                                            </p>
                                            <p>
                                                <b>Disponibilidad</b>: <span id="spanAvailable"
                                                    class="text-success font-weight-bold"></span><br>
                                                <small class="text-danger" id="noteAvailable"></small>
                                            </p>
                                            <label for="sku_id">Seleccione una referencia</label>
                                            <select class="form-control" id="sku_id" name="sku_id" required>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Color</th>
                                                                <td id="tdColor"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Freno</th>
                                                                <td id="tdFreno"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Rin</th>
                                                                <td id="tdRin"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Velocidad</th>
                                                                <td id="tdVelocidad"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <figure id="containerImage">

                                                </figure>
                                            </div>
                                        </div>
                                        <button id="btnRental" type="submit" class="btn btn-lg btn-primary"><i
                                                class="fas fa-ticket-alt"></i>
                                            Alquilar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="Info py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-5">Información</h2>

                    <div class="row">
                        <article class="col-12 col-md-4">
                            <div class="card p-3 mb-3 mb-md-0 shadow rounded border-0 h-100">
                                <div class="card-body">
                                    <h4 class="my-3">Entrega y devolución</h4>
                                    <p>
                                        La entrega y devolución se debe realizar en nuestra oficina.
                                        Debes tener en cuenta que debes dejar un depósito que consiste en un documento de
                                        identidad con foto y un valor en efectivo reembolsable.
                                    </p>

                                    <i class="fas fa-undo-alt Info__icon"></i>

                                </div>
                            </div>
                        </article>
                        <article class="col-12 col-md-4">
                            <div class="card p-3 shadow rounded border-0 h-100">
                                <div class="card-body">
                                    <h4 class="my-3">Revisar equipo</h4>
                                    <p>
                                        Revisa muy bien tu equipo antes de salir, ya que una vez el equipo sea entregado
                                        será exclusivamente tu responsabilidad hasta que lo retornes.
                                    </p>
                                    <i class="fas fa-clipboard-check Info__icon"></i>
                                </div>
                            </div>
                        </article>
                        <article class="col-12 col-md-4">
                            <div class="card p-3 shadow rounded border-0 h-100">
                                <div class="card-body">
                                    <h4 class="my-3">Ubicación</h4>
                                    <p>
                                        Los prestamos solo se realizaran en la ciudad de Barranquilla y sus zonas cercanas.
                                    </p>
                                    <i class="fas fa-map-marked-alt Info__icon"></i>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
