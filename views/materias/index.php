@extends('views/layout.php')

@section('content-title')
Dashboard
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
      Materias
    </h3>
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                <h4 class="card-title">Lista de materias</h4>

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
                            <?php
                              foreach($materias as $materia) {
                                ?>
                                <tr>
                                    <td><?=$materia->id?></td>
                                    <td><?=$materia->name?></td>
                                    <td><?=$materia->created_at?></td>
                                    <td><?=$materia->updated_at?></td>
                                    <td></td>
                                </tr>
                                <?php
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
               </div>
            </div>
        </div>
    </div>

@endsection