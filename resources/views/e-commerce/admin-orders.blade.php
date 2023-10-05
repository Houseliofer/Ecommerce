@extends('layout.e-commerce')

@section('title', 'Orders')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!--Inicia contenido-->
    <div class="container">
        <h1>Lista de Ordenes</h1>

        <!-- Tabla para mostrar las ordenes-->
        <table class="table" id="tblOrders">
            <thead>
                <tr>
                    <th>Numero de Orden</th>
                    <th>Nombre del producto</th>
                    <th>Creado el</th>
                    <th>Precio</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
                <!-- Las ordenes se agregarán aquí -->
                @foreach ($orders as $o)
                <tr>
                    <td>{{ $o->order_no}}</td>
                    <td>{{$o->product_name}}</td>
                    <td>{{$o->created_at}}</td>
                    <td>{{$o->price}}</td>
                    <td>@isset($o->status)
                        {{$o->status}}
                        @endisset
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" style="text-align:right">Total:</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
