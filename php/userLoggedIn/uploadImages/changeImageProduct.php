<?php

require_once '../../Clases/Operaciones.php';

$ID_usuario = $_SESSION['ID_USUARIO'];

$carpeta = '../../../img/products/'.$ID_usuario.'/';

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

$operacion = new Operaciones();
$con = $operacion->conectar();

$_SESSION['ID_producto'] = $_POST['idProduct'];
$_SESSION['imagen1Producto'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][0]);
$_SESSION['imagen2Producto'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][1]);
$_SESSION['imagen3Producto'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][2]);
$_SESSION['imagen4Producto'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][3]);
$_SESSION['imagen5Producto'] = $ID_usuario.'_'.basename($_FILES["fileToUpload"]["name"][4]);

$target_dir = "../../../img/products/".$ID_usuario.'/';
$target_file1 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][0]);
$target_file2 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][1]);
$target_file3 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][2]);
$target_file4 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][3]);
$target_file5 = $target_dir . $ID_usuario . '_'. basename($_FILES["fileToUpload"]["name"][4]);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][0], $target_file1);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][1], $target_file2);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][2], $target_file3);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][3], $target_file4);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][4], $target_file5);

echo "<script type='text/javascript'>location.href='../../main.php?tipo=changeImageProduct';</script>";


?>