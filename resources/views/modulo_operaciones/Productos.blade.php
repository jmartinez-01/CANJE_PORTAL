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
                    <h1 class="card-title">LISTA DE PRODUCTOS PARA CANJE</h1>
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
                    <th>CODIGO</th>
                    <th>CODIGO DE BARRA</th>
                    <th>NOMBRE PRODUCTO</th>
                    <th>FORMA FARMACEUTICA</th>
                    <th>ESPECIALIDAD</th>
                    <th>MARCA_PRODUCTO</th>
                    <th>UNIDAD DE MEDIDA</th>
                    <th>VIA ADMINISTRACION</th>
                    <th>ESTADO</th>
                    <th>LABORATORIO</th>
                    <th>ESCALA</th>
                    <th>CANJE</th>
                    <th>CONTENIDO_NETO</th>
                    <th>CONSUMO_DIARIO</th>
                    <th>CONSUMO_MAX_ANUAL</th>
                    <th>CANJE_MAX_ANUAL</th>
                    <th>FECHA_CREACION</th>
                    <th>CREADO_POR</th>
                    <th>FECHA_MODIFICACION</th>
                    <th>MODIFICADO_POR</th>
                    <th>ACCION</th>  
                    </tr>
                </thead>
                <!--Tabla_BODY-->
                <tbody>
                      @foreach ($Productos as $Producto)
                    <tr>
                        <th>{{$con=$con+1}}</th>
                        <td>{{ $Producto["id_producto"]}}</td>
                        <td>{{ $Producto["codigo_barra"]}}</td>
                        <td>{{ $Producto["nombre_producto"]}}</td>
                        <td>{{ $Producto["forma_farmaceutica"]}}</td>
                        <td>{{ $Producto["especialidad"]}}</td>
                        <td>{{ $Producto["marca_producto"]}}</td>
                        <td>{{ $Producto["unidad_medida"]}}</td>
                        <td>{{ $Producto["via_administracion"]}}</td>
                        <td>{{ $Producto["estado"]}}</td>
                        <td>{{ $Producto["nombre_laboratorio"]}}</td>
                        <td>{{ $Producto["escala"]}}</td>
                        <td>{{ $Producto["canje"]}}</td>
                        <td>{{ $Producto["contenido_neto"]}}</td>
                        <td>{{ $Producto["consumo_diario"]}}</td>
                        <td>{{ $Producto["consumo_max_anual"]}}</td>
                        <td>{{ $Producto["canjes_max_anual"]}}</td>
                        <td>{{ $Producto["fecha_creacion"]}}</td>
                        <td>{{ $Producto["creado_por"]}}</td>
                        <td>{{ $Producto["fecha_modificacion"]}}</td>
                        <td>{{ $Producto["modificado_por"]}}</td>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editor-{{$Producto['id_producto']}}"><i class="bi bi-pencil-fill"></i> ACTUALIZAR </a>
                            
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
 @foreach ($Productos as $Producto)
<div class="modal fade" id="modal-editor-{{$Producto['id_producto']}}">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">ACTUALIZAR PRODUCTO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="editar_producto" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
            <div class="row">
            <input type="hidden" id="cod" name="cod" class="form-control" value="{{ $Producto['id_producto']}}" required>
                
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">CODIGO_BARRA</label>
                    <input type="text" id="barra" name="barra" class="form-control" value="{{$Producto['codigo_barra']}}" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">NOMBRE_PRODUCTO</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{$Producto['nombre_producto']}}" required>
                </div>
                </div>


                <div class="col-md-6">
                <div class="form-group">
                <label for="">FORMA_FARMASEUTICA</label>
                <select id="farma" name="farma" class="form-control"requied>
                 @foreach ($tblfarmaseutica as $tbl)
                <option value="{{ $tbl['id_forma_farmaceutica']}}" selected>{{$tbl["forma_farmaceutica"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">ESPECIALIDAD</label>
                <select id="especialidad" name="especialidad" class="form-control"requied>
                 @foreach ($tblespecialidad as $tbl)
                <option value="{{ $tbl['id_especialidad']}}" selected>{{$tbl["nombre_especialidad"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">MARCA_PRODUCTO</label>
                <select id="marca" name="marca" class="form-control"requied>
                 @foreach ($tblmarca as $tbl)
                <option value="{{ $tbl['id_marca_producto']}}" selected>{{$tbl["marca_producto"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">UNIDAD_MEDIDA</label>
                <select id="unidad" name="unidad" class="form-control"requied>
                 @foreach ($tblunidad as $tbl)
                <option value="{{ $tbl['id_unidad_medida']}}" selected>{{$tbl["unidad_medida"]}}</option>
                @endforeach
                </select>
                </div>
                </div>


                
                <div class="col-md-6">
                <div class="form-group">
                <label for="">VIA_ADMINISTRACION</label>
                <select id="via" name="via" class="form-control"requied>
                 @foreach ($tbladministracion as $tbl)
                <option value="{{ $tbl['id_via_administracion']}}" selected>{{$tbl["via_administracion"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">ESTADO</label>
                <select id="estdo" name="estdo" class="form-control"requied>
                 @foreach ($tblestado as $tbl)
                <option value="{{ $tbl['id_estado']}}"selected>{{$tbl["estado"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">LABORATORIO</label>
                <select id="laboratorio" name="laboratorio" class="form-control"requied>
                 @foreach ($tbllaboratorio as $tbl)
                <option value="{{ $tbl['id_laboratorio']}}"selected>{{$tbl["nombre_laboratorio"]}}</option>
                @endforeach
                </select>
                </div>
                </div>


                <div class="col-md-6">
                <div class="form-group">
                    <label for="">ESCALA</label>
                    <input type="text" id="escala" name="escala" class="form-control" value="{{$Producto['escala']}}" required>
                </div>
                </div>


                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CANJE</label>
                    <input type="text" id="canje" name="canje" class="form-control" value="{{$Producto['canje']}}" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CONTENIDO_NETO</label>
                    <input type="text" id="neto" name="neto" class="form-control" value="{{$Producto['contenido_neto']}}" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CONSUMO_DIARIO</label>
                    <input type="text" id="consumo" name="consumo" class="form-control" value="{{$Producto['consumo_diario']}}" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CONSUMO_MAX_ANUAL</label>
                    <input type="text" id="max" name="max" class="form-control" value="{{$Producto['consumo_max_anual']}}" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CANJES_MAX_ANUAL</label>
                    <input type="text" id="canjemax" name="canjemax" class="form-control" value="{{$Producto['canjes_max_anual']}}" required>
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




<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">


            <div class="modal-header">
              <h4 class="modal-title">AGREGAR UN NUEVO PRODUCTO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="agregar_producto" method="post">
            @csrf
            <div class="modal-body">
            <div class="row">




            <div class="col-md-6">
                <div class="form-group">
                    <label for="">CODIGO_BARRA</label>
                    <input type="text" id="barra" name="barra" class="form-control"  required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">NOMBRE_PRODUCTO</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"  required>
                </div>
                </div>


                <div class="col-md-6">
                <div class="form-group">
                <label for="">FORMA_FARMASEUTICA</label>
                <select id="farma" name="farma" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tblfarmaseutica as $tbl)
                <option value="{{ $tbl['id_forma_farmaceutica']}}">{{$tbl["forma_farmaceutica"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">ESPECIALIDAD</label>
                <select id="especialidad" name="especialidad" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tblespecialidad as $tbl)
                <option value="{{ $tbl['id_especialidad']}}">{{$tbl["nombre_especialidad"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">MARCA_PRODUCTO</label>
                <select id="marca" name="marca" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tblmarca as $tbl)
                <option value="{{ $tbl['id_marca_producto']}}">{{$tbl["marca_producto"]}}</option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <label for="">UNIDAD_MEDIDA</label>
                <select id="unidad" name="unidad" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tblunidad as $tbl)
                <option value="{{ $tbl['id_unidad_medida']}}">{{$tbl["unidad_medida"]}}</option>
                @endforeach
                </select>
                </div>
                </div>


                
                <div class="col-md-6">
                <div class="form-group">
                <label for="">VIA_ADMINISTRACION</label>
                <select id="via" name="via" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tbladministracion as $tbl)
                <option value="{{ $tbl['id_via_administracion']}}">{{$tbl["via_administracion"]}}</option>
                @endforeach
                </select>
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

                <div class="col-md-6">
                <div class="form-group">
                <label for="">LABORATORIO</label>
                <select id="laboratorio" name="laboratorio" class="form-control"requied>
                <option >SELECCIONA</option>
                 @foreach ($tbllaboratorio as $tbl)
                <option value="{{ $tbl['id_laboratorio']}}">{{$tbl["nombre_laboratorio"]}}</option>
                @endforeach
                </select>
                </div>
                </div>


                <div class="col-md-6">
                <div class="form-group">
                    <label for="">ESCALA</label>
                    <input type="text" id="escala" name="escala" class="form-control"  required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CANJE</label>
                    <input type="text" id="canje" name="canje" class="form-control"  required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CONTENIDO_NETO</label>
                    <input type="text" id="neto" name="neto" class="form-control"  required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CONSUMO_DIARIO</label>
                    <input type="text" id="consumo" name="consumo" class="form-control"  required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CONSUMO_MAX_ANUAL</label>
                    <input type="text" id="max" name="max" class="form-control"  required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="">CANJES_MAX_ANUAL</label>
                    <input type="text" id="canjemax" name="canjemax" class="form-control"  required>
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