<?php

include ('../../../app/config.php');

$id = $_POST['id'];


$sentencia = $pdo->prepare("DELETE FROM tb_facturas WHERE id = '$id' ");

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino de la manera correcta en la base de datos";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/facturas/show_factura.php');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/facturas/delete_factura.php');
}
