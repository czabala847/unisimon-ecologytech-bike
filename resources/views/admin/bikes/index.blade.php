@extends('adminlte::page')

@section('title', 'Dashboard | Bicicletas')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Bicicletas</h1>
        <button class="btn btn-primary ml-2" id="btnNewBike"><i class="fas fa-plus-circle"></i> Nueva</button>
    </div>
@stop

@section('content')
    <section class="Bikes">

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
                    <table class="table" id="bike_table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Código</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Sku</th>
                                <th scope="col">Nombre Sku</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bikes as $bike)
                                <tr>
                                    <th scope="row">{{ $bike->id }}</th>
                                    <td>{{ $bike->code }}</td>
                                    <td>
                                        @if ($bike->status === 'D')
                                            <span class="badge badge-pill badge-success">Disponible</span>
                                        @else
                                            <span class="badge badge-pill badge-secondary">En prestamo</span>
                                        @endif
                                    </td>
                                    <td>{{ $bike->sku->sku }}</td>
                                    <td>{{ $bike->sku->name }}</td>
                                    <td>
                                        <button data-id={{ $bike->id }} data-action="edit" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                            <span>Editar</span>
                                        </button>
                                        <form id="formDelete" class="d-inline-block"
                                            action="{{ route('bikes.destroy', $bike->id) }}" method="POST">
                                            <button type="button" data-action="delete" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Eliminar</span>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="modalBike" tabindex="-1" aria-labelledby="modalBikeLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBikeLabel">Nueva Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-bike" autocomplete="off" method="POST" data-url="{{ route('bikes.store') }}"
                        action="{{ route('bikes.store') }}">
                        <div class="form-group">
                            <label for="sku_id">SKU</label>
                            <select class="form-control" id="sku_id" name="sku_id" required>
                                @foreach ($skus as $sku)
                                    <option value="{{ $sku->id }}">{{ $sku->sku }}</option>
                                @endforeach
                            </select>
                            @if (count($skus) === 0)
                                <small class="text-danger">No hay skus creados, debe primero crear uno.</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="code">Código</label>
                            <input type="text" name="code" class="form-control" id="code" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                        @csrf
                        @method('POST')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/app.js"></script>
@stop
