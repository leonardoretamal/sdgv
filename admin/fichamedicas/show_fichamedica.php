<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Veterinario',
    'Cliente'
);
// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
?>

    <div class="container-fluid">
        <div class="alert alert-danger mt-3" role="alert">
            <h4 class="alert-heading">Acceso denegado</h4>
            <p>No tienes permisos suficientes para acceder a esta página. Por favor, contacta al administrador.</p>
        </div>
    </div>

<?php
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}

$id = $_GET['id'];
include("../../app/controllers/fichamedica_controllers/datos_controller.php");
?>
<br>
<div class="container-fluid">
    <p class="fs-1 text-center fw-bold"> Ficha Medica</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Registros</b></h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm" onclick="generarReporte()">Generar Reporte</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?php echo $URL; ?>/admin/fichamedicas/showfichamedica.php" method="post">
                        <div class="card-body">
                            <!-- se envia formulario a controlador -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- propio de bootstrap -->
                                        <label for="">ID Ficha Medica: </label>
                                        <input type="number" value="<?php echo $ficha_id; ?>" name="ficha_id" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- propio de bootstrap -->
                                        <label for="">ID mascota: </label>
                                        <input type="number" value="<?php echo $mascota_id; ?>" name="mascota_id" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Mascota: </label>
                                        <input type="text" value="<?php echo $mascota_nombre; ?>" name="mascota_nombre" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tipo Mascota: </label>
                                        <input type="text" value="<?php echo $mascota_tipo; ?>" name="mascota_tipo" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Diagnostico: </label>
                                        <input type="text" value="<?php echo $diagnostico; ?>" name="diagnostico" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tratamiento: </label>
                                        <input type="text" value="<?php echo $tratamiento; ?>" name="tratamiento" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha: </label>
                                        <input type="text" value="<?php echo $fecha; ?>" name="fecha" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ID especialista: </label>
                                        <input type="number" value="<?php echo $especialista_id; ?>" name="especialista_id" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Especialista: </label>
                                        <input type="text" value="<?php echo $especialista_nombre; ?>" name="cliente_nombre" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellido Especialista: </label>
                                        <input type="text" value="<?php echo $especialista_apellido_paterno; ?>" name="cliente_apellido_paterno" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Emitida: </label>
                                        <input type="text" value="<?php echo $fecha; ?>" name="fyf_creacion" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <hr class="border border-danger border-2 opacity-50">

                            <div class="col-md-12 row justify-content-center">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <form action="<?php echo $URL ?>/app/controllers/fichamedica_controllers/delete_fichamedica_controller.php" method="post">
                                        <input type="text" value="<?php echo $id; ?>" name="id" hidden>
                                        <a href="showfichamedica.php" class="btn btn-secondary">Volver</a>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>