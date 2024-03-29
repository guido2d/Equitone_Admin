@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cotizaciones realizadas
                    <a href="/descargar-excel" class="btn btn-secondary btn-sm float-right">Descargar excel</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nro. Cotización</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Comuna</th>
                                <th scope="col">mt2</th>
                                <th scope="col">¿Instalador?</th>
                                <th scope="col">Tiempo Construcción</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cotizaciones as $c)
                            <tr>
                                <th scope="row">{{$c->codigo}}</th>
                                <td>{{ $c->nombre }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->telefono }}</td>
                                <td>{{ $c->comuna }}</td>
                                <td>{{ number_format($c->mt2aRevestir, 2, ',', '') }}</td>
                                <td>{{ $c->instalador }}</td>
                                <td>{{ $c->tiempo_construccion }}</td>
                                <td>{{ date( "d-m-Y H:i:s", strtotime($c->created_at)) }}</td>
                                <td><a href="http://equitone.activuat.com/ver-resultados/{{ $c->codigo }}" target="_blank" class=""><img src="{{ asset('img/detail.svg') }}" width="40"></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $cotizaciones->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
