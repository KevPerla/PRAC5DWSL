@extends('views/layout.php')

@section('content-title')
Registro de usuarios
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Nuevo usuario
    </h3>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="/guardar-usuario" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-pen mr-2"></i>
                                    <h5 class="mb-0">Formulario de registro de usuarios</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Ingresa los nombres" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ingresa los apellidos" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa la contraseña" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="grupo">Grupo de usuario</label>
                                        <select name="grupo" id="grupo" class="form-control">
                                            @foreach ($grupos as $grupo)
                                            <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                                    <a href="/users" class="btn btn-light">Cancelar</a>
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