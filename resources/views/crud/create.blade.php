@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Cliente</h1>
@stop

@section('content')
    
    <form action="/dash/crud/" method="post" >
        @csrf
        <div class="row d-flex flex-column align-items-center">
            <h3>Bienvenido a crear cliente</h3>
            <div class="col-5">
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="surnames" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="address" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" name="phone">
                </div>
            </div>
            
        </div>  
        <div class="row d-flex justify-content-center ">
            <a href="/dash/crud/" class="btn btn-secondary m-2" >Cancelar</a> 
            <button type="submit" class="btn btn-primary m-2" >Guardar</button> 
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop