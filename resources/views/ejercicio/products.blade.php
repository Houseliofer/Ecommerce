@extends('layout.e-commerce')

@section('title', 'Products')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!--Inicia contenido-->
    <div class="container">
        <h1>Lista de Productos</h1>

        <!-- Botón para mostrar productos uno por uno -->
        <select id="selectCategories" style="width: 50%"></select>
        &nbsp;&nbsp;&nbsp;
        <button id="btnMostrar">Mostrar Producto</button>

        <!-- Tabla para mostrar los productos -->
        <table class="table" id="tblProducts">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio de Venta</th>
                    <th>Categoria</th>
                    <th>Color</th>
                    <th>Tamanio</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los productos se agregarán aquí -->
            </tbody>
        </table>
    </div>
@endsection
