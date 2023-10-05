@extends('layout.e-commerce')

@section('title', 'Users')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!--Inicia contenido-->
    <div class="container">
        <h1>Crear nuevo usuario</h1>
    
        <form id="registrarUsuario" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="first_name">Nombre de pila:</label>
                <input type="text" 
                    name="first_name" 
                    id="first_name" 
                    class="form-control" 
                    value="{{old('first_name')}}">
            </div>
    
            <div class="form-group">
                <label for="last_name">Apellido:</label>
                <input type="text" 
                        name="last_name" 
                        id="last_name" 
                        class="form-control"
                        value="{{old('last_name')}}">
            </div>
    
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" 
                        name="email" id="email" 
                        class="form-control"
                        value="{{old('email')}}">
            </div>
    
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" 
                        name="phone" 
                        id="phone" 
                        class="form-control"
                        value="{{old('first_name')}}">
            </div>
    
            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" 
                        name="address" 
                        id="address" 
                        class="form-control"
                        value="{{old('address')}}">
            </div>
    
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" 
                        name="password" 
                        id="password" 
                        class="form-control"
                        value="{{old('password')}}">
            </div>
    
            <button  class="btn btn-primary" id="submit-button">Crear usuario</button>
        </form>
    </div>
    
    <!--Termina Contenido-->
    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="{{asset('img')}}/brand-1.png" alt=""></div>
                <div class="brand-item"><img src="{{asset('img')}}/brand-2.png" alt=""></div>
                <div class="brand-item"><img src="{{asset('img')}}/brand-3.png" alt=""></div>
                <div class="brand-item"><img src="{{asset('img')}}/brand-4.png" alt=""></div>
                <div class="brand-item"><img src="{{asset('img')}}/brand-5.png" alt=""></div>
                <div class="brand-item"><img src="{{asset('img')}}/brand-6.png" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->
@endsection