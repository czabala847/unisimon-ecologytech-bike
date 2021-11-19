@extends('adminlte::page')

@section('title', 'Dashboard | Referencias')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Referencias</h1>
        <a class="btn btn-primary ml-2" href="{{ route('skus.create') }}">Nueva</a>
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
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Sku</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skus as $sku)
                                {{-- <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <button data-id={{ $category->id }} data-action="edit" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                            <span>Editar</span>
                                        </button>
                                        <form id="formDelete" class="d-inline-block"
                                            action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            <button type="submit" data-action="delete" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Eliminar</span>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr> --}}
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
@stop
