<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Prestamo</title>

    <style>
        body {
            font-family: "HelveticaNeue-CondensedBold", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        }

        /* .client {
            border: 1px solid #000;
            padding: 5px;
        } */

        table,
        th,
        td {
            border: 1px solid black;
            width: 100%;
            text-align: center;
        }

        .tableAttr {
            width: 40%;
        }

    </style>
</head>

<body>
    <header>
        <div>
            <p>Detalle de Alquiler Cod. {{ $rental->id }}</p>
            <p>Fecha de generación PDF {{ date('Y-m-d') }}</p>
        </div>
        <h1>Ecologitech Bike</h1>
    </header>
    <section class="client">
        <p>Datos del cliente:</p>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Nombre: </th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Correo: </th>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="bike">
        <p>Datos de la Bicicleta:</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">Categoria</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $bike->code }}</th>
                    <td>{{ $bike->sku->sku }}</td>
                    <td>{{ $bike->sku->name }}</td>
                    <td>{{ $bike->sku->category->name }}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <p>Caracteristicas:</p>
    <section class="bike">
        <table class="tableAttr">
            <thead>
                <tr>
                    <th scope="col">Propiedad</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Color</th>
                    <td>{{ $attrs[0]->value }}</td>
                </tr>
                <tr>
                    <th scope="row">Freno</th>
                    <td>{{ $attrs[1]->value }}</td>
                </tr>
                <tr>
                    <th scope="row">Rin</th>
                    <td>{{ $attrs[2]->value }}</td>
                </tr>
                <tr>
                    <th scope="row">Velocidad</th>
                    <td>{{ $attrs[3]->speed }} KM/H</td>
                </tr>

            </tbody>
        </table>

    </section>

    <section class="bike">
        <p>Datos del alquiler:</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Fecha recogida</th>
                    <th scope="col">Fecha devolución</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Valor pagado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $rental->id }}</th>
                    <td>{{ $rental->date_start }}</td>
                    <td>{{ $rental->date_end }}</td>
                    <td>{{ $rental->total_hours }}</td>
                    <td>$ {{ number_format($rental->total_pay) }}</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>

</html>
