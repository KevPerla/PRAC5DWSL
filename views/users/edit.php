@extends('views/layout.php')

@section('content-title')
Actualizacion de usuarios
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Editar usuario {{$users->nombres}} {{$users->apellidos}}
    </h3>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="/actualizar-usuario/{{$users->id}}" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-pen mr-2"></i>
                                    <h5 class="mb-0">Informacion general de usuarios</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="nombres">Carnet</label>
                                        <input type="text" name="carnet" id="carnet" value="{{$users->carnet}}"
                                            class="form-control" placeholder="Ingresa el carnet" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" name="nombres" id="nombres" value="{{$users->nombres}}"
                                            class="form-control" placeholder="Ingresa los nombres" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" value="{{$users->apellidos}}"
                                            class="form-control" placeholder="Ingresa los apellidos" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="grupo">Grupo de usuario</label>
                                        <select name="grupo" id="grupo" class="form-control">
                                            @foreach ($grupos as $grupo)
                                            @if($users->id_user_group == $grupo->id)
                                            <option value="{{$grupo->id}}" selected>{{$grupo->name}}</option>
                                            @else
                                            <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-lock mr-2"></i>
                                    <h5 class="mb-0">Credenciales e imagen de perfil</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Ingresa la contraseña">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control"
                                            accept="image/">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="imagen">Imagen actual</label>
                                        <div style="width: 25%">
                                            <img class="img-thumbnail img-fluid" src="/uploads/{{$users->carnet}}/{{$users->imagen}}" alt="profile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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