
@extends ('layouts.principal')
@section('content')


<br>
<div value="{{$con=0}}"></div>
<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <!--Tarjeta-->
    <div class="card">
        <!--Tarjeta_CABEZA-->
        <div class="card-header">
                    <h1 class="card-title">LISTA DE ZONAS</h1>
                    <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">+NUEVO</button>
                    <a href="{{ url('inicio') }}" class="btn btn-secondary">VOLVER</a>
                   
                    </div>
                    </div>
       
      
        <div class="card-body">  <!--Tarjeta_BODY-->
            <!--Tabla-->
            <table id="example1" class="table table-bordered table-striped  ">
                <!--Tabla_CABEZA-->
                <thead class=" text-center bg-danger blue text-white ">
                    <tr>
                        <th>n°</th>
                        <th>PAIS</th>
                        <th>CODIGO</th>
                        <th>ZONA</th>
                        <th>ESTADO</th>
                        <th>FECHA_CREACION</th>
                        <th>CREADO_POR</th>
                        <th>FECHA_MODIFICACION</th>
                        <th>MODIFICADO_POR</th>
                        <th>ACCION</th>
                       
                    </tr>
                </thead>
                <!--Tabla_BODY-->
                <tbody>
                      @foreach ($Zonas as $Zona)
                    <tr>
                        <th>{{$con=$con+1}}</th>
                        <td>{{ $Zona["id_zona"]}}</td>
                        <td>{{ $Zona["nombre_pais"]}}</td>
                        <td>{{ $Zona["zona"]}}</td>
                        <td>{{ $Zona["estado"]}}</td>
                        <td>{{ $Zona["fecha_creacion"]}}</td>
                        <td>{{ $Zona["creado_por"]}}</td>
                        <td>{{ $Zona["fecha_modificacion"]}}</td>
                        <td>{{ $Zona["modificado_por"]}}</td>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editor-{{$Zona['id_zona']}}"><i class="bi bi-pencil-fill"></i> ACTUALIZAR </a>
                            
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--FIN_Tabla-->
        </div>
    </div>
    <!--FIN_Tarjeta-->
    </div>
    </div>
    </div>
</section>

 <!--MODAL EDITAR-->
 @foreach ($Zonas as $Zona)
<div class="modal fade" id="modal-editor-{{$Zona['id_zona']}}">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">ACTUALIZAR ZONA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="editar_zona" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
            <div class="row">
              
            <input type="hidden" id="cod" name="cod" class="form-control" value="{{ $Zona['id_zona']}}" required>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">ZONA</label>
                    <input type="text" id="zona" name="zona" class="form-control" value="{{$Zona['zona']}}" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">ESTADO</label>
                <select id="estdo" name="estdo" class="form-control"requied>
                 @foreach ($tblestado as $tbl)
                <option value="{{ $tbl['id_estado']}}">{{$tbl["estado"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">PAIS</label>
                <select id="pais" name="pais" class="form-control"requied>
                 @foreach ($tblpais as $tbl)
                <option value="{{ $tbl['id_pais']}}">{{$tbl["nombre_pais"]}}</option>
                @endforeach
                </select>
                </div>
                </div>
                 

            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
              <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
            </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

<!--AGREGAR TIPO ENTIDAD-->



<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">


            <div class="modal-header">
              <h4 class="modal-title">AGREGAR UNA ZONA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="agregar_zona" method="post">
            @csrf
            <div class="modal-body">
            <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                <label for="">PAIS</label>
                <select id="pais" name="pais" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tblpais as $tbl)
                <option value="{{ $tbl['id_pais']}}">{{$tbl["nombre_pais"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">ZONA</label>
                    <input type="text" id="zona" name="zona" class="form-control" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">ESTADO</label>
                <select id="estdo" name="estdo" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tblestado as $tbl)
                <option value="{{ $tbl['id_estado']}}">{{$tbl["estado"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
              <button type="submit" class="btn btn-primary">AGREGAR</button>
            </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection()