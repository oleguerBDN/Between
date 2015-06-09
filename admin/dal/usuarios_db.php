<?php

include("../../includes/general_settings.php");

//BORRAR USUARIO

if(isset($_GET["id"]))
{

$id=$_GET["id"];

$borrar = mysql_query("DELETE FROM usuarios_public WHERE id='$id'", $conn); 

if (!$borrar) {
    die("Fallo al borrar un registro de la Base de Datos: " . mysql_error());
}

header("location:". BASE_URL . "admin/usuarios.php");
}

//AÑADIR USUARIO

elseif(isset($_POST["username"]) & ($_POST["password"]!='') & !isset($_POST["id"]))
{
    
$username = $_POST["username"]; 
$password = $_POST["password"]; 

$insertar = mysql_query("INSERT INTO usuarios_public (username, password) values ('$username', '$password')", $conn);



if (!$insertar) {
    die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}   

header("location:". BASE_URL . "admin/usuarios.php");

}

else{
    
    header("location:". BASE_URL . "admin/usuarios.php");
    
}



?>
