@extends('views/layout.php')

@section('content-title')
Asignar permisos {{$grupo->name}}
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Asignar permisos {{$grupo->name}}
    </h3>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="/cambiar-permisos/{{$grupo->id}}" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-pen mr-2"></i>
                                    <h5 class="mb-0">Formulario de asignacion de permisos</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-3">Lista de permisos</h6>
                                </div>
                            </div>
                            <div class="row">
                            @foreach($permisos as $permiso)
                                <div class="col-lg-2 col-md-4 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="permisos[]" class="form-check-input" value="{{$permiso->id}}" {{$permiso->asigned ? "checked" : ""}}>
                                                 @php
                                                 $name = str_replace('_', ' ', $permiso->name);
                                                 echo strtoupper($name);
                                                 @endphp
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                                    <a href="/grupos" class="btn btn-light">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection