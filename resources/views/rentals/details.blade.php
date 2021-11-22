@extends('adminlte::page')

@section('title', 'Alquiler | Detalle')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Alquileres</h1>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="alquileres_table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Código Bicicleta</th>
                                @if (auth()->user()->roles[0]->name === 'Admin')
                                    <th>Cliente</th>
                                @endif
                                <th scope="col">SKU</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Fecha de recogida</th>
                                <th scope="col">Fecha de entrega</th>
                                <th scope="col">Horas Alquiladas</th>
                                <th scope="col">Total Pagado</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $rental)
                                <tr>
                                    <th scope="row">{{ $rental->id }}</th>
                                    <td>{{ $rental->bike->code }}</td>
                                    @if (auth()->user()->roles[0]->name === 'Admin')
                                        <th>{{ $rental->user->name }}</th>
                                    @endif
                                    <td>{{ $rental->bike->sku->sku }}</td>
                                    <td>{{ $rental->bike->sku->name }}</td>
                                    <td>{{ $rental->date_start }}</td>
                                    <td>{{ $rental->date_end }}</td>
                                    <td>{{ number_format($rental->total_hours) }}</td>
                                    <td>$ {{ number_format($rental->total_pay) }}</td>
                                    <td>
                                        <a target="_blank" href="{{ url('alquiler/detallePDF') . '/' . $rental->id }} "
                                            class="btn btn-success">
                                            <i class="fas fa-file-pdf"></i>
                                            <span>PDF</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    <script>
        const $table = document.querySelector("#alquileres_table") || null;
        if ($table) {
            $("#alquileres_table").DataTable({
                // dom: "Bfrtip",
                // buttons: ["copy", "csv", "excel", "pdf", "print"],
                aProcessing: true,
                aServerSide: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
                },
                pageLength: 25,
                responsive: "true",
                bDestroy: true,
                order: [
                    [0, "asc"]
                ],
            });
        }
    </script>
@stop
