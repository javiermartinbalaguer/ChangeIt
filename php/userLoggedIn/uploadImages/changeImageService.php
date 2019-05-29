<?php

require_once '../../Clases/Operaciones.php';

$ID_usuario = $_SESSION['ID_USUARIO'];

$carpeta = '../../../img/services/'.$ID_usuario.'/';

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

$operacion = new Operaciones();
$con = $operacion->conectar();

$_SESSION['ID_servicio'] = $_POST['idService'];
$_SESSION['imagen1Servicio'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][0]);
$_SESSION['imagen2Servicio'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][1]);
$_SESSION['imagen3Servicio'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][2]);

$target_dir = "../../../img/services/".$ID_usuario.'/';
$target_file1 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][0]);
$target_file2 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][1]);
$target_file3 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][2]);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][0], $target_file1);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][1], $target_file2);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][2], $target_file3);

echo "<script type='text/javascript'>location.href='../../main.php?tipo=changeImageService';</script>";

?>