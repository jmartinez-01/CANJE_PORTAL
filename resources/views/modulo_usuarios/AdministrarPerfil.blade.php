@extends ('layouts.principal')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    
                </div>

                <div class="card-body text-center">
                    <!-- Contenedor para centrar la imagen y el ícono -->
                    <h4>ADMINISTRAR PERFIL</h4>
                    <div class="d-flex justify-content-center position-relative">
                        <div class="text-center position-relative">
                            <img src="{{ asset('../../dist/img/Foto_perfil.png') }}" alt="Imagen de Perfil" class="img-thumbnail" style="width: 150px; height: 150px;">
                            
                            <br></br>
                            <!-- Ícono para cambiar la foto -->
                            <a href="#" class="position-absolute" style="bottom: 5px; right: 5px; background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 5px;" onclick="document.getElementById('profile_image').click();">
                                <i class="fa fa-camera" style="font-size: 20px; color: white;"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Mostrar campos de perfil bloqueados -->
                    <form class="mt-3">
                        <div class="form-group mx-auto" style="width: 300px;">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" value="Nombre del Usuario" readonly>
                        </div>

                        <div class="form-group mx-auto" style="width: 300px;">
                            <label for="username">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" value="NombreDeUsuario" readonly>
                        </div>

                        <div class="form-group mx-auto" style="width: 300px;">
                            <label for="phone">Celular</label>
                            <input type="text" class="form-control" id="phone" value="123-456-7890" readonly>
                        </div>

                        <div class="form-group mx-auto" style="width: 300px;">
                            <label for="email">Dirección de Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" value="correo@ejemplo.com" readonly>
                        </div>

                        <!-- Campo oculto para subir la imagen -->
                        <div class="form-group" style="display:none;">
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image" onchange="this.form.submit();">
                        </div>

                        <!-- Botón para actualizar la imagen -->
                        <!-- <div class="text-center mt-3">
                            <button type="button" class="btn btn-primary">Actualizar Imagen</button>
                        </div>
                    </form>
                    -->
                    <!-- Botón para cambiar la contraseña -->
                    <div class="text-center mt-4">
                        <a href="CambiarContrasena" class="btn btn-default btn-flat">Cambiar Contraseña</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
