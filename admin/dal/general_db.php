<?php

die("entra en local");

include("../../includes/general_settings.php");
include("../../includes/functions.php");

//EDITAR CATEGORÍA


   
$direccion= $_POST['direccion'];
$correo = $_POST["correo"]; 
$texto_login= $_POST['texto_login']; 
$telefono = $_POST["telefono"];

$insertar = mysql_query ("Update general Set direccion='$direccion', texto_login='$texto_login', correo='$correo', telefono='$telefono' Where id='1'" , $conn);

// ----------------------------------------------

$imagen = "imagen";

for ($i = 1; $i <= 4; $i++) {
        
    $nombre = $_FILES[$imagen . $i]["name"];
    $direccion = $_FILES[$imagen . $i]["tmp_name"];
    $uploads_dir = '../../userfiles/';
    $old_file = FALSE;
    
    if ($i==1 or $i==2){
    $thumbnail_size = //array para las imagenes
            array(
                'large' => array(
                    'width' => '470',
                    'height' => '390',
                    'scale' => TRUE
                ),
                'thumbs' => array(
                    'width' => '100',
                    //'height' => '200',
                    'scale' => TRUE
                )
    );
    }
    else
    {
        
        $thumbnail_size = //array para las imagenes
            array(
                'large' => array(
                    'width' => '745',
                    //'height' => '500',
                    'scale' => TRUE
                ),
                'thumbs' => array(
                    'width' => '100',
                    //'height' => '200',
                    'scale' => TRUE
                )
    );
                
    }   
    
    
    $rename = TRUE;
    $name = saveFile($nombre, $direccion, $uploads_dir, $old_file, $thumbnail_size, $rename);
    $nom = $imagen . $i; 
    
    if ($_FILES[$imagen . $i]["name"] != "") {
        $res = mysql_query("SELECT $nom FROM general WHERE id='1'", $conn);

        if (mysql_result($res, 0) != "") {
            $res = mysql_query("SELECT $nom FROM general WHERE id='1'", $conn);
            unlink("../../userfiles/large/".mysql_result($res, 0));
            unlink("../../userfiles/thumbs/".mysql_result($res, 0));
            unlink("../../userfiles/".mysql_result($res, 0));
        }
        $insertar = mysql_query("UPDATE general SET $nom = '$name' WHERE '1' = id ", $conn);
              
        if (!$insertar) {
            die("Fallo en la inserción de registro en la Base de Datos: " . mysql_error());
        }
    }
}

// ----------------------------------------------


if (!$insertar) {
    die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}   

header("location:". BASE_URL . "admin/general.php");

?>
