@extends('adminlte::page')

@section('title', 'CRUD - Laravel')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    <!--<p>Bienvenido al listar cliente</p>-->
    <a href="/dash/crud/create" class="btn btn-primary mb-4">Crear Cliente</a>
    <table id="clientes" class="table table-bordered mt-4">
        <thead class="table-dark"> 
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Telefonos</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 0;
            @endphp
            @foreach ($clientes as $cliente)
                <tr>
                    @php
                        $contador = $contador+1;  
                    @endphp
                    <th>{{$contador}}</th>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellidos}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td>
                        <form action="{{route("crud.destroy",$cliente->id)}}" method="post">
                            @csrf
                            @method("delete")        
                            <a href="/dash/crud/{{$cliente->id}}/edit" class="btn btn-warning">Editar</a> 
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#clientes').DataTable({
                "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@stop