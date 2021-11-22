@extends('adminlte::page')

@section('title', 'Usuario | Editar')

@section('content_header')
    <div class="d-flex my-3">
        <h1 class="d-inline">Usuarios | Editar</h1>
    </div>
@stop

@section('content')
    <section class="User User__Edit">

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
                <form id="form-category" autocomplete="off" method="POST" action="{{ route('users.update', $user) }}">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <h5>Roles</h5>
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    id="check-{{ $role->id }}">
                                <label class="form-check-label" for="check-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach

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
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/app.js"></script>
@stop
