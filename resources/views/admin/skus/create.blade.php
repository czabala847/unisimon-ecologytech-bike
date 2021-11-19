@extends('adminlte::page')

@section('title', 'Referencias | Crear')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Referencias | Crear</h1>
    </div>
@stop

@section('content')
    <section class="Skus">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
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
                <form autocomplete="off" method="POST" action="#" id="form">
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" id="category" name="category" aria-disabled="true">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if (count($categories) === 0)
                            <small class="text-danger">No hay categorias creadas, debe primero crear una.</small>
                        @endif
                    </div>
                    <div class="card">
                        <h6 class="card-header">Referencia - SKU</h6>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input class="form-control mx-2" type="text" name="sku" id="sku" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name-sku">Nombre SKU</label>
                                    <input type="text" class="form-control" name="name-sku" id="name-sku" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Precio</label>
                                    <input type="number" class="form-control" name="price" id="price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h6 class="card-header">Propiedades</h6>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" name="color" id="color" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="brake">Freno</label>
                                    <input type="text" class="form-control" name="brake" id="brake">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rin">Rin</label>
                                    <input type="text" class="form-control" name="rin" id="rin" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="speed">Velocidad</label>
                                    <input type="text" class="form-control" name="speed" id="speed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    @csrf
                    @method('POST')
                </form>
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
