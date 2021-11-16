@extends('adminlte::page')

@section('title', 'Dashboard | Bicicletas')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Bicicletas</h1>
        <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#modalNewCategory">Nueva</button>
    </div>
@stop

@section('content')
    <section class="Categories">

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

            </div>
        </div>
    </section>

    <!-- Modal -->
    {{-- <div class="modal fade" id="modalNewCategory" tabindex="-1" aria-labelledby="modalNewCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNewCategoryLabel">Nueva Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" method="POST" action="{{ route('categories.store') }}">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" name="description" class="form-control" id="description"
                                cols="30" rows="3" aria-expanded="false" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        @csrf
                        @method('POST')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop
