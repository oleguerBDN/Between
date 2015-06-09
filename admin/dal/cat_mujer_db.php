<?php

include("../../includes/general_settings.php");

//BORRAR CATEGORÍA

if(isset($_GET["id"]))
{

$id=$_GET["id"];

$borrar = mysql_query("DELETE FROM cat_mujer WHERE id='$id'", $conn); 

if (!$borrar) {
    die("Fallo al borrar un registro de la Base de Datos: " . mysql_error());
}

header("location:". BASE_URL . "admin/categoriasm.php");
}

//AÑADIR CATEGORÍA

elseif(isset($_POST["nombre"]) & !isset($_POST["id"]))
{
    
$nombre = strtoupper($_POST["nombre"]); 

$res = mysql_query("SELECT id FROM cat_mujer ORDER BY id DESC LIMIT 1", $conn);
$id = mysql_result($res, 0) + 1;

$insertar = mysql_query("INSERT INTO cat_mujer (id, nombre) values ('$id', '$nombre')", $conn);

echo $nombre;

if (!$insertar) {
    die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}   

header("location:". BASE_URL . "admin/categoriasm.php");

}

//EDITAR CATEGORÍA

elseif(isset($_POST["id"]))
{
    
$id= $_POST["id"];
$nombre = $_POST["nombre"]; 

$insertar = mysql_query ("Update cat_mujer Set nombre='$nombre' Where id='$id'" , $conn);

if (!$insertar) {
    die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}   

header("location:". BASE_URL . "admin/categoriasm.php");
}

?>
