@extends('views/layout.php')

@section('content-title')
Materias
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
      Materias
    </h3>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="/materias" method="get">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fa fa-search"></i>
                                Buscar materias
                            </h4>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresa el nombre de la materia"
                                    aria-label="Ingresa el nombre de la materia" name="search" value="{{$search}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <div class="col-lg-12">
            <div class="card">
               <div class="card-body">

               <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-list mr-2"></i>
                    <h5 class="mb-0">Lista de materias</h5>
                </div>

            <a href="/agregar-materia" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nuevo
            </a>
            </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Creado en</th>
                                <th>Actualizado en</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                              @foreach($materias as $materia)
                                <tr>
                                    <td>{{$materia->id}}</td>
                                    <td>{{$materia->name}}</td>
                                    <td>{{$materia->created_at}}</td>
                                    <td>{{$materia->updated_at}}</td>
                                    <td>
                                        <a href="#" class="mr-1">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{$paginator}}
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>

@endsection