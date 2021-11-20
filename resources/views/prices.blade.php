@extends('layouts.app')

@section('content')
    <section class="min-vh-100 w-100 ViewPrices" id="ViewPrices">
        <div class="row min-vh-100 border border-danger">
            <div
                class="col-12 col-md-5 border d-flex align-items-center justify-content-center border-success ViewPrices__form">
                <form action="" class="border border-success w-100 px-3">
                    <div class="form-group">
                        <label for="date-start">Fecha de recogida</label>
                        <input type="datetime-local" class="form-control" min="{{ date('Y-m-d') . 'T' . date('H:i') }}"
                            id="date-start">
                    </div>
                    <div class="form-group">
                        <label for="date-end">Fecha de entrega</label>
                        <input type="datetime-local" class="form-control" id="date-end">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            <div class="col-12 col-md-7 border border-primary">
                texto
            </div>
        </div>
    </section>
@endsection
