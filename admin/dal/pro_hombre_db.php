<?php

include("../../includes/general_settings.php");
include("../../includes/functions.php");

//BORRAR PRODUCTO

if(isset($_GET["id"]))
{

$id=$_GET["id"];



$res = mysql_query("SELECT imagen FROM pro_hombre WHERE id='$id'", $conn);
        
        if (mysql_result($res, 0) != "") {
            echo "entra segon if";
            $res = mysql_query("SELECT imagen FROM pro_hombre WHERE id='$id'", $conn);
            unlink("../../userfiles/large/".mysql_result($res, 0));
            
            $res = mysql_query("SELECT imagen FROM pro_hombre WHERE id='$id'", $conn);
            unlink("../../userfiles/thumbnail/".mysql_result($res, 0));
            
            unlink("../../userfiles/".mysql_result($res, 0));
        }

$borrar = mysql_query("DELETE FROM pro_hombre WHERE id='$id'", $conn); 

if (!$borrar) {
    die("Fallo al borrar un registro de la Base de Datos: " . mysql_error());
}

header("location:". BASE_URL . "admin/productosh.php");
}

//INSERTAR PRODUCTO

elseif(isset($_POST["modelo"]) & !isset($_GET["id"]) & !isset($_POST["id"]))
{
    
$modelo = $_POST["modelo"]; 
$color = $_POST["color"];
$tallas = $_POST["tallas"]; 
$precio_cost = $_POST["precio_cost"];
$pvp = $_POST["pvp"]; 
$id_cat = $_POST["id_cat"]; 
$descripcion = $_POST["descripcion"];

$res = mysql_query("SELECT id FROM pro_hombre ORDER BY id DESC LIMIT 1", $conn);
$id = mysql_result($res, 0) + 1;

$insertar = mysql_query("INSERT INTO pro_hombre (id, modelo, color, tallas, precio_cost, pvp, id_cat, descripcion) values ('$id', '$modelo', '$color', '$tallas', '$precio_cost', '$pvp', '$id_cat', '$descripcion')", $conn);

//INSERTAR IMAGEN DENRO DEL IF DE INSERTAR PRODUCTO

    $imagen = "imagen";
    echo "ieieie";
    $nombre = $_FILES[$imagen]["name"];
    echo "Nombre = " . $nombre; 
    $direccion = $_FILES[$imagen]["tmp_name"];
    $uploads_dir = '../../userfiles/';
    $old_file = FALSE;
    $thumbnail_size = //array para las imagenes
            array(
                'large' => array(
                    'width' => '160',
                    //'height' => '500',
                    'scale' => TRUE
                ),
                'thumbnail' => array(
                    //'width' => '50',
                    'height' => '80',
                    'scale' => TRUE
                )
    );
    $rename = TRUE;
    $name = saveFile($nombre, $direccion, $uploads_dir, $old_file, $thumbnail_size, $rename);
    
        $insertar = mysql_query("UPDATE pro_hombre SET imagen = '$name' WHERE '$id' = id ", $conn);
    

if (!$insertar) {
    die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}   

header("location:". BASE_URL . "admin/productosh.php");

}

//MODIFICAR PRODUCTO

elseif(isset($_POST["id"]))
{
    
$id= $_POST["id"];
$modelo = $_POST["modelo"]; 
$color = $_POST["color"];
$tallas = $_POST["tallas"]; 
$precio_cost = $_POST["precio_cost"];
$pvp = $_POST["pvp"]; 
$id_cat = $_POST["id_cat"]; 
$descripcion = $_POST["descripcion"];

$insertar = mysql_query ("Update pro_hombre Set modelo='$modelo', color='$color', tallas='$tallas', precio_cost='$precio_cost', pvp='$pvp', id_cat='$id_cat', descripcion='$descripcion' Where id='$id'" , $conn);

$imagen="imagen";

if (isset($_FILES[$imagen]["name"]) & $_FILES[$imagen]["name"]!=""){

$res = mysql_query("SELECT imagen FROM pro_hombre WHERE id='$id'", $conn);
        
        if (mysql_result($res, 0) != "") {
            $res = mysql_query("SELECT imagen FROM pro_hombre WHERE id='$id'", $conn);
            unlink("../../userfiles/large/".mysql_result($res, 0));
            
            $res = mysql_query("SELECT imagen FROM pro_hombre WHERE id='$id'", $conn);
            unlink("../../userfiles/thumbnail/".mysql_result($res, 0));
            
            unlink("../../userfiles/".mysql_result($res, 0));
        }
        
    $nombre = $_FILES[$imagen]["name"];
    $direccion = $_FILES[$imagen]["tmp_name"];
    $uploads_dir = '../../userfiles/';
    $old_file = FALSE;
    $thumbnail_size = //array para las imagenes
            array(
                'large' => array(
                    'width' => '160',
                    //'height' => '500',
                    'scale' => TRUE
                ),
                'thumbnail' => array(
                    //'width' => '50',
                    'height' => '80',
                    'scale' => TRUE
                )
    );
    $rename = TRUE;
    $name = saveFile($nombre, $direccion, $uploads_dir, $old_file, $thumbnail_size, $rename);
    
    $insertar = mysql_query("UPDATE pro_hombre SET imagen = '$name' WHERE '$id' = id ", $conn);    
    
}


if (!$insertar) {
    die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}   
header("location:". BASE_URL . "admin/productosh.php");
}

?>
