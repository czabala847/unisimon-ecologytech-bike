@extends('adminlte::page')

@section('title', 'Dashboard | Precios de prestamos')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Precios prestamos</h1>
        <button class="btn btn-primary ml-2" id="btnNewPrice"><i class="fas fa-plus-circle"></i> Nueva</button>
    </div>
@stop

@section('content')
    <section class="Prices">

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
                    <table class="table" id="prices_table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Tarifa</th>
                                <th scope="col" style="width: 50%;">Descripción</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices as $price)
                                <tr>
                                    <th scope="row">{{ $price->id }}</th>
                                    <td>{{ $price->category->name }}</td>
                                    <td>$ {{ number_format($price->price) }}</td>
                                    <td>{{ $price->description }}</td>
                                    <td>
                                        <button data-id={{ $price->id }} data-action="edit" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                            <span>Editar</span>
                                        </button>
                                        <form id="formDelete" class="d-inline-block"
                                            action="{{ route('prices.destroy', $price->id) }}" method="POST">
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
    <div class="modal fade" id="modalPrices" tabindex="-1" aria-labelledby="modalPricesLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPricesLabel">Nueva Tarifa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-prices" autocomplete="off" method="POST" data-url="{{ route('prices.store') }}"
                        action="{{ route('prices.store') }}">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if (count($categories) === 0)
                                <small class="text-danger">No hay categorias creadas, debe primero crear una.</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="price">Precio por hora</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" name="description" class="form-control" id="description"
                                cols="30" rows="3" aria-expanded="false" required></textarea>
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
