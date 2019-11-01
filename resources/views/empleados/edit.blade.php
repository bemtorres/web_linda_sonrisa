@extends('layout.layout')


@section('contenido')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Base Form Control</div>
                    </div>
                    <form action="{{ route('empleado.store') }}" method="post">
                        <div class="card-body">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="form-group">
                                    <label for="text1">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="text1" name="username" placeholder="">
                                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                            <div class="form-group">
                                <label for="text1">Run</label>
                                <input type="text" class="form-control" id="text1" name="run" placeholder="Ingrese su run">
                                {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            <div class="form-group">
                                    <label for="text1">Nombre</label>
                                    <input type="text" class="form-control" id="text1" name="nombres" placeholder=" su run">
                                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            
                            <div class="form-group">
                                    <label for="text1">Apellido</label>
                                    <input type="text" class="form-control" id="text1" name="apellidos" placeholder="Ingrese su run">
                                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                                <div class="form-group">
                                        <label for="text1">Correo</label>
                                        <input type="text" class="form-control" id="text1" name="correo" placeholder="Ingrese su run">
                                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                            
                
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success pull-rigth">Agregar</button>
                        </div>
                    </form>
                </div>							
            </div>					
        </div>
    </div>
</div>

			
@stop
	