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
        <h1>Lista de Empleados</h1>

        <!-- Botón para mostrar productos uno por uno -->
        <select id="selectCategories" style="width: 50%"></select>
        &nbsp;&nbsp;&nbsp;
        <button id="btnMostrar">Mostrar Empleado</button>

        <!-- Tabla para mostrar los productos -->
        <table class="table" id="tblEmployees">
            <thead>
                <tr>
                    <th>EMP. NO<</th>
                    <th>FULL NAME</th>
                    <th>E-MAIL</th>
                    <th>GENDER</th>
                    <th>SALARY</th>
                    <th>DEPARTMENT</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los productos se agregarán aquí -->
                @foreach ($employees as $e)
                    <tr>
                        <td>{{ $e->emp_no}}</td>
                        <td>{{$e->first_name}} {{$e->last_name}}</td>
                        <td>{{$e->email}}</td>
                        <td>{{$e->gender}}</td>
                        <td>{{$e->salary}}</td>
                        <td>{{$e->department}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
