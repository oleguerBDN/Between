<?php

include '../includes/general_settings.php';

session_start();

//Agafo las dades que he pasat del index.html al login.js
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//Busco un usuaris amb las dades que li he passat. 
$ssql = "SELECT * FROM usuarios_public WHERE username='$username' and password='$password'";

//Executo la sentencia
$rs = mysql_query($ssql, $conn);





//Comprobem... si ens dona algun resultat es que l'usuari i contrasenya es correcte. 


if (mysql_num_rows($rs) != 0) {
    $_SESSION['public']['user'] = $username;
    echo("OK");
    return ("OK");
} 

//else {

    //No existeix l'usuari-contrasenya, el deixo al login un altre cop. 
    //echo("Usuario y/o contraseña incorrecto. ");
//}
    
mysql_free_result($rs);
mysql_close($conn);
?> 