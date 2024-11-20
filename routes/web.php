<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;




//RUTAS DEL SISTEMA 

// Ruta pública
Route::get('/', function () { return view('layouts.Login'); });

// Ruta de verificación de login
Route::post('/login_verificar', [LoginController::class, 'verificar_Login']);


   

// middleware auth
Route::middleware(['auth'])->group(function () {
Route::get('/inicio', function () { return view('inicio'); });

Route::get('/VistaLaboratorio', function () { return view('VistaLaboratorio'); });
Route::get('/VistaFarmacia', function () { return view('VistaFarmacia'); });
Route::get('/VistaDistribuidor', function () { return view('VistaDistribuidor'); });
Route::get('/VistaPaciente', function () { return view('VistaPaciente'); });
   

//Route::get( 'Login',  [App\Http\Controllers\LoginController::class,            'index']);    //Accion  Login
Route::get( 'Generar',  [App\Http\Controllers\GenerarController::class,            'index']);    //Accion  Login
Route::get( 'GenerarExcel',  [App\Http\Controllers\GenerarExcelController::class,            'index']);    //Accion  Login

//MODULO DE SEGURIDAD


Route::get('Permisos', [App\Http\Controllers\PermisoController::class, 'index']);
Route::get('Parametros', [App\Http\Controllers\ParametroController::class, 'index']);
Route::get('Bitacora', [App\Http\Controllers\BitacoraController::class, 'index']);
Route::get('Objeto', [App\Http\Controllers\ObjetoController::class, 'index']);
Route::get('Backup_Restore', [App\Http\Controllers\Backup_RestoreController::class, 'index']);

//Route::get('ForgotPassword', [App\Http\Controllers\ForgotPasswordController::class, 'index']);
Route::get('CambiarContrasena', [App\Http\Controllers\CambiarContrasenaController::class, 'index']);
Route::get('AdministrarPerfil', [App\Http\Controllers\AdministrarPerfilController::class, 'index']);



//MODULO DE OPERACIONES
Route::get('Laboratorios', [App\Http\Controllers\LaboratoriosController::class, 'index']);
Route::get('Farmacias', [App\Http\Controllers\FarmaciasController::class, 'index']);
Route::get('Productos', [App\Http\Controllers\ProductosController::class, 'index']);
Route::get('Pacientes', [App\Http\Controllers\PacientesController::class, 'index']);
Route::get( 'GenerarLaboratorios',  [App\Http\Controllers\GenerarLaboratoriosController::class,            'index']);  
Route::get( 'GenerarFarmacias',  [App\Http\Controllers\GenerarFarmaciasController::class,            'index']);  
Route::get( 'GenerarProductos',  [App\Http\Controllers\GenerarProductosController::class,            'index']);  
Route::get( 'GenerarPacientes',  [App\Http\Controllers\GenerarPacientesController::class,            'index']);  


//MODULO DE CANJES
Route::get('Canjes', [App\Http\Controllers\CanjeController::class, 'index']);
Route::get('Facturas', [App\Http\Controllers\FacturaController::class, 'index']);
Route::get('Devoluciones', [App\Http\Controllers\DevolucionController::class, 'index']);
Route::get( 'GenerarCanjes',  [App\Http\Controllers\GenerarCanjesController::class,            'index']);  

//MODULO DE MANTENIMIENTO




Route::get('Marca', [App\Http\Controllers\MarcaProductoController::class, 'index']);
Route::get('Ciudad', [App\Http\Controllers\CiudadController::class, 'index']);

Route::get('UnidadMedida', [App\Http\Controllers\UnidadMedidaController::class, 'index']);
Route::get('TipoContacto', [App\Http\Controllers\TipoContactoController::class, 'index']);




//  ´-------------------1-----------Estado TERMINADO  
Route::get('Estado', [App\Http\Controllers\EstadoController::class, 'index']);
Route::post('Agregar_Estado',  [App\Http\Controllers\EstadoController::class, 'store']);
Route::put('/EditarEstado', [App\Http\Controllers\EstadoController::class, 'update']);

//---------------------2------------PAIS  TERMINADO
Route::get('Pais', [App\Http\Controllers\PaisController::class, 'index']);
Route::post('agregar_pais',  [App\Http\Controllers\PaisController::class, 'store']);
Route::put('editar_pais', [App\Http\Controllers\PaisController::class, 'update']);

//.....................3..............ESTADO_CANJE  NO ME AGREGAR  
Route::get('Estado_Canje', [App\Http\Controllers\EstadoCanjeController::class, 'index']);
Route::post('agregar_estado_canje',[App\Http\Controllers\EstadoCanjeController::class, 'store']);
Route::put('editar_estado_canje', [App\Http\Controllers\EstadoCanjeController::class, 'update']);

//------------------4------------TIPO ENTIDAD TERMINADO
Route::get('TipoEntidad', [App\Http\Controllers\TipoEntidadController::class, 'index']);
Route::post('agregar_entidad',[App\Http\Controllers\TipoEntidadController::class, 'store']);
Route::put('editar_entidad', [App\Http\Controllers\TipoEntidadController::class, 'update']);

//--------------------5-----------TIPO REGISTRO  TERMINADO
Route::get('TipoRegistro', [App\Http\Controllers\TipoRegistroController::class, 'index']);
Route::post('agregar_registro',[App\Http\Controllers\TipoRegistroController::class, 'store']);
Route::put('editar_registro', [App\Http\Controllers\TipoRegistroController::class, 'update']);


//--------------6-----------------------UNIDAD MEDIDA TERMINADO
Route::get('UnidadMedida', [App\Http\Controllers\UnidadMedidaController::class, 'index']);
Route::post('agregar_unimedida',[App\Http\Controllers\UnidadMedidaController::class, 'store']);
Route::put('editar_unimedida', [App\Http\Controllers\UnidadMedidaController::class, 'update']);

//-------------------7------------UNIDAD ROLES TERMINADO CON EXITO
Route::get('Roles', [App\Http\Controllers\RolController::class, 'index']);
Route::post('agregar_rol',[App\Http\Controllers\RolController::class, 'store']);
Route::put('editar_rol', [App\Http\Controllers\RolController::class, 'update']);

//----------8------------------UNIDAD VIA_ADMINISTRACION TERMINADO CON EXITO
Route::get('ViaAdministracion', [App\Http\Controllers\ViaAdministracionController::class, 'index']);
Route::post('agregar_viadmin',[App\Http\Controllers\ViaAdministracionController::class, 'store']);
Route::put('editar_viadmin', [App\Http\Controllers\ViaAdministracionController::class, 'update']);

//-----------------9------------UNIDAD TERMINADO CON EXITO
Route::get('Zona', [App\Http\Controllers\ZonaController::class, 'index']);
Route::post('agregar_zona',[App\Http\Controllers\ZonaController::class, 'store']);
Route::put('editar_zona', [App\Http\Controllers\ZonaController::class, 'update']);

//----------------------10--------------------UNIDAD DEPARTAMENTO TERMINADO CON EXITO
Route::get('Departamento', [App\Http\Controllers\DepartamentoController::class, 'index']);
Route::post('agregar_depto',[App\Http\Controllers\DepartamentoController::class, 'store']);
Route::put('editar_depto', [App\Http\Controllers\DepartamentoController::class, 'update']);

//----------------------11--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO

Route::get('Municipio', [App\Http\Controllers\MunicipioController::class, 'index']);
Route::post('agregar_municipio',[App\Http\Controllers\MunicipioController::class, 'store']);
Route::put('editar_municipio', [App\Http\Controllers\MunicipioController::class, 'update']);

//----------------------12--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO
Route::get('Especialidad', [App\Http\Controllers\EspecialidadController::class, 'index']);
Route::post('agregar_especialidad',[App\Http\Controllers\EspecialidadController::class, 'store']);
Route::put('editar_especialidad', [App\Http\Controllers\EspecialidadController::class, 'update']);


//----------------------13--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO
Route::get('FormaFarmaceutica', [App\Http\Controllers\FormaFarmaceuticaController::class, 'index']);
Route::post('agregar_farmaceutica',[App\Http\Controllers\FormaFarmaceuticaController::class, 'store']);
Route::put('editar_farmaceutica', [App\Http\Controllers\FormaFarmaceuticaController::class, 'update']);

//----------------------14--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO
Route::get('Usuarios', [App\Http\Controllers\UsuarioController::class, 'index']);
Route::post('agregar_usuario',[App\Http\Controllers\UsuarioController::class, 'store']);
Route::put('editar_usuario', [App\Http\Controllers\UsuarioController::class, 'update']);

//-------------------------------------TBLA PACIENTES

Route::get('Pacientes', [App\Http\Controllers\PacientesController::class, 'index']);
Route::post('agregar_paciente',[App\Http\Controllers\PacientesController::class, 'store']);
Route::put('editar_paciente', [App\Http\Controllers\PacientesController::class, 'update']);

//-------------------------------------TBLA Productos
Route::get('Productos', [App\Http\Controllers\ProductosController::class, 'index']);
Route::post('agregar_producto',[App\Http\Controllers\ProductosController::class, 'store']);
Route::put('editar_producto', [App\Http\Controllers\ProductosController::class, 'update']);

//----------------------WILLIAN--------------------UNIDAD MARCAS COMPLETADO
Route::get('Marca', [App\Http\Controllers\MarcaProductoController::class, 'index']);
Route::post('agregar_marca',[App\Http\Controllers\MarcaProductoController::class, 'store']);
Route::put('editar_marca', [App\Http\Controllers\MarcaProductoController::class, 'update']);

//----------------------14--------------------TIPO CONTADO TERMINADO
Route::get('TipoContacto', [App\Http\Controllers\TipoContactoController::class, 'index']);
Route::post('agregar_tipo_contacto',[App\Http\Controllers\TipoContactoController::class, 'store']);
Route::put('editar_tipo_contacto', [App\Http\Controllers\TipoContactoController::class, 'update']);

//----------------------WILI--------------------UNIDAD LABORATORIOs
Route::get('Laboratorios', [App\Http\Controllers\LaboratoriosController::class, 'index']);
Route::post('agregar_laboratorio',[App\Http\Controllers\LaboratoriosController::class, 'store']);
Route::put('editar_laboratorio', [App\Http\Controllers\LaboratoriosController::class, 'update']);


//----------------------WILLI--------------------UNIDAD FARMACIAS
Route::get('Farmacias', [App\Http\Controllers\FarmaciasController::class, 'index']);
Route::post('agregar_farmacia',[App\Http\Controllers\FarmaciasController::class, 'store']);
Route::put('editar_farmacia', [App\Http\Controllers\FarmaciasController::class, 'update']);

//----------------------14--------------------CONTACTO 
Route::get('Contacto', [App\Http\Controllers\ContactosController::class, 'index']);
Route::post('agregar_contacto',[App\Http\Controllers\ContactosController::class, 'store']);
Route::put('editar_contacto', [App\Http\Controllers\ContactosController::class, 'update']);

//------------------------------------------- SUCURSAL
Route::get('Sucursal', [App\Http\Controllers\SucursalesController::class, 'index']);
Route::post('agregar_sucursal',[App\Http\Controllers\SucursalesController::class, 'store']);
Route::put('editar_sucursal', [App\Http\Controllers\SucursalesController::class, 'update']);

}); //aqui termina middleware auth dega



//MODULO DE OTRAS PAGINAS

Route::get('acerca', [App\Http\Controllers\acercaController::class, 'index']);
Route::get('terminos', [App\Http\Controllers\terminosController::class, 'index']);
Route::get('politica_privacidad', [App\Http\Controllers\politica_privacidadController::class, 'index']);









//  Administrar perfil"
use App\Http\Controllers\AdministrarPerfilController;

Route::get('/forgot-password', function () {
    return view('modulo_usuarios.forgot-password');
})->name('password.request');



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');











//rutas DEGA
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');

// Ruta para enviar el enlace de restablecimiento
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.sendResetLink');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/Login', [LoginController::class, 'login'])->name('login.perform'); // Acción Login

use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

use App\Http\Controllers\PasswordController;
Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.reset');





use App\Http\Controllers\CambiarContrasenaController;

// Ruta para mostrar el formulario de cambio de contraseña
Route::get('/cambiar-contrasena', [CambiarContrasenaController::class, 'index'])->name('cambiar-contrasena.index')->middleware('auth');

// Ruta para procesar el formulario de cambio de contraseña
Route::post('/cambiar-contrasena', [CambiarContrasenaController::class, 'store'])->name('cambiar-contrasena.store')->middleware('auth');

Route::get('/administrar-perfil', [AdministrarPerfilController::class, 'index'])->name('administrarPerfil');


use App\Http\Controllers\LogoutController;
// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




//rutas Jairo

// Mostrar la vista de administración de perfil
Route::get('/perfil', [AdministrarPerfilController::class, 'show'])->name('perfil.show');

// Ruta para actualizar el perfil del usuario
Route::post('/perfil/actualizar', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');

// Ruta para mostrar la vista de cambio de contraseña
Route::get('/perfil/cambiar-contrasena', [PerfilController::class, 'cambiarContraseña'])->name('perfil.cambiar_contrasena');

// (Opcional) Ruta para guardar la nueva contraseña
Route::post('/perfil/guardar-contrasena', [PerfilController::class, 'guardarContrasena'])->name('perfil.guardar_contrasena');


