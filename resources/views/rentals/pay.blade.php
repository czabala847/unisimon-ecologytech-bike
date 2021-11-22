@extends('adminlte::page')

@section('title', 'Pagar')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Pagar Alquiler</h1>
    </div>
@stop

@section('content')
    <section class="Pay">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Detalle a pagar
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6" style="overflow: hidden">
                            <div class="table-responsive mt-3">
                                <table class="table mb-5">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Fecha de recogida</th>
                                            <td>{{ $dataRental['dateStart'] }} -
                                                {{ $dataRental['timeStart'] . ' : 00' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fecha de devolución</th>
                                            <td>{{ $dataRental['dateEnd'] }} - {{ $dataRental['timeEnd'] . ' : 00' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total horas</th>
                                            <td>{{ $dataRental['totalHours'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total a pagar</th>
                                            <td>$ {{ number_format($rentalPricing->price * $dataRental['totalHours']) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('rental.store') }}" class="w-100" style="overflow: hidden"
                                    method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group row">
                                        <div class="col-9">
                                            <label for="card_numer">Número de tarjeta</label>
                                            <input type="number" class="form-control" id="card_numer" name="card_number"
                                                required>
                                        </div>
                                        <div class="col-3">
                                            <label for="cvv">CVV</label>
                                            <input type="number" class="form-control" name="cvv" id="cvv" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="bike_id" id="bike_id" value="{{ $bike->id }}">
                                    <input type="hidden" name="date_start" id="date_start"
                                        value="{{ $dataRental['dateStart'] }} {{ $dataRental['timeStart'] . ':00:00' }}">
                                    <input type="hidden" name="date_end" id="date_end"
                                        value="{{ $dataRental['dateEnd'] }} {{ $dataRental['timeEnd'] . ':00:00' }}">
                                    <input type="hidden" name="total_hours" id="totalHours"
                                        value="{{ $dataRental['totalHours'] }}">
                                    <input type="hidden" name="total_pay" id="totalPay"
                                        value="{{ $rentalPricing->price * $dataRental['totalHours'] }}">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-dollar-sign"></i>
                                        Pagar</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <table class="table mt-3">
                                <tbody>
                                    <tr>
                                        <th scope="row">Tipo de Bicicleta</th>
                                        <td>Bicicleta - {{ $rentalPricing->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Referencia</th>
                                        <td>{{ $sku->sku }} - {{ $sku->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Código de bicicleta</th>
                                        <td>{{ $bike->code }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/app.js"></script>
@stop
