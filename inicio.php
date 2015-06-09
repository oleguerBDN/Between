<?php
include("includes/general_settings.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es-ES">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <link rel="canonical" href=""/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!--[if lt IE 7]>
                    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                <![endif]-->


        <?php
        
        if (!isset($_SESSION['public'])) {
            echo "No hay sesion abierta.";
            header("location: " . BASE_URL . "index.php");
        }
        ?>   
        
        <header>
            <div class="center">          
               <div class="logo"></div>
            </div> 
        </header>
        
        <div class="center index"> 
                <article>
                <?php 
                $res = mysql_query("SELECT direccion, telefono, correo, imagen1, imagen2 FROM general WHERE id='1'", $conn);
                $row = mysql_fetch_array($res);
                echo "<a href='". BASE_URL . "hombre'><img class='index1' title='sdf' src='userfiles/large/". $row["imagen1"] . "' alt='sdf' width='470' height='390'></a>";
                echo "<a href='". BASE_URL . "mujer'><img class='index1' title='sdf' src='userfiles/large/". $row["imagen2"] . "' alt='sdf' width='470' height='390'></a>";
                ?>
                </article>
        </div>
        
        <footer>
            <div class="center">
                <?php 
                echo "<p>" . $row["direccion"] . "</p>";
                echo "<p>" . $row["correo"] . "   &nbsp;&nbsp;&nbsp;   |   &nbsp;&nbsp;&nbsp;   " . $row["telefono"] . "</p>";
                ?>
            </div>
        </footer>
        
        <script src="js/jquery.js"></script> 
        <script src="js/thickbox.js"></script> 
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src='//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
