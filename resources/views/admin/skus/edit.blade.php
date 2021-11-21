@extends('adminlte::page')

@section('title', 'Referencias | Editar')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Referencias | Editar</h1>
    </div>
@stop

@section('content')
    <section class="Skus Sku__Edit">

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
                <form enctype="multipart/form-data" autocomplete="off" method="POST"
                    action="{{ route('skus.update', $sku) }}" id="form">
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option {{ $category->id == $sku->category_id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if (count($categories) === 0)
                            <small class="text-danger">No hay categorias creadas, debe primero crear una.</small>
                        @endif
                    </div>
                    <div class="card">
                        <h6 class="card-header">Referencia - SKU</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="sku">SKU</label>
                                        <input class="form-control mx-2" type="text" name="sku" id="sku"
                                            value="{{ $sku->sku }}" disabled required />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nombre Referencia</label>
                                        <input class="form-control mx-2" type="text" name="name" id="name"
                                            value="{{ $sku->name }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input class="form-control mx-2" type="number" name="price" id="price"
                                            value="{{ $sku->price }}" required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="drag-area"
                                        data-img="{{ asset('images/upload') . '/' . $sku->image }}">
                                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                        {{-- <header>Imagen</header> --}}
                                        <button type="button">Busca una imagen</button>
                                        <input type="file" name="image" class="mb-3 d-none" />
                                    </div>
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
                                    <input type="text" class="form-control" name="color" id="color"
                                        value="{{ $attributes[0]->value }}" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="brake">Freno</label>
                                    <input type="text" class="form-control" name="brake" id="brake"
                                        value="{{ $attributes[1]->value }}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rin">Rin</label>
                                    <input type="text" class="form-control" name="rin" id="rin"
                                        value="{{ $attributes[2]->value }}" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="speed">Velocidad KM/H</label>
                                    <input type="text" class="form-control" name="speed" id="speed"
                                        value="{{ $attributes[3]->value }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    @csrf
                    @method('PUT')
                </form>
            </div>
        </div>

    </section>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/libs/DragDropFile/css/app.css') }}">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/libs/DragDropFile/js/app.js') }}"></script>
    <script src="/js/app.js"></script>
@stop
