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
                <nav>      
                    <ul>
                        <li class="active"><a title="" href="<?php echo BASE_URL . "hombre"?>">HOMBRE</a></li>
                        <li><a title="" href="<?php echo BASE_URL . "mujer"?>">MUJER</a></li>
                    </ul>
                </nav>    

                <div class="logo"></div>
            </div> 
        </header>

        <div class="center"> 
            <div class="menu">   
                <menu>
                    <ul>
                        
                    <?php
                    $query = "SELECT id, nombre FROM cat_hombre ";
                    $result = mysql_query($query);
                    
                    if (isset($_GET["cat"]))
                        $cat=$_GET["cat"];
                    
                    while ($row = mysql_fetch_array($result)) 
                    {
                    $nombre=$row["nombre"];
                    $id=$row["id"];
                    
                    if ($cat==$id)
                        echo "<li class='active'><a href='" .  BASE_URL . "hombre?cat=$id'>$nombre</a></li>";
                    else
                        echo "<li><a href='" .  BASE_URL . "hombre?cat=$id'>$nombre</a></li>";
                    }
                    ?>

                    </ul>
                </menu>
            </div>
            
            <?php if (isset($_GET["cat"])) { ?>
            <div class="productos">
                <article>
                    <ul>
                                    <?php 
                                    $query = "SELECT id, id_cat, modelo, color, tallas, precio_cost, pvp, imagen FROM pro_hombre WHERE id_cat='$cat' ";
                                    $result = mysql_query($query);
                                    $numero = 0; 
                                       
                                    while($row = mysql_fetch_array($result))
                                    {
                                    $id=$row["id"]; 
                                    echo "<li>";    
                                    
                                    if ($row["imagen"]=="")
                                    echo "<figure><a href='".BASE_URL. "producto.php?cat=$cat&s=hombre&id=$id'><img class='bordeimagen' title='' src='img/nofoto.png' width='160' height='220'></a></figure>";                               
                                    else
                                    echo "<figure><a href='".BASE_URL. "producto.php?cat=$cat&s=hombre&id=$id'><img class='bordeimagen' title='' src='userfiles/large/". $row["imagen"] . "' width='160' height='220'></a></figure>";
                                    
                                    //echo "<p> id: " . $row["id"] . "</p>";
                                    echo "<p><strong> Mod. " . $row["modelo"] . "</strong></p>";
                                    
                                    if ($row["color"]!=""){
                                    echo "<p> Color: " . $row["color"] . "</p>";
                                    }
                                    //echo "<p> Tallas " . $row["tallas"] . "</p>";
                                    //echo "<p> Precio coste: " . $row["precio_cost"] . "€" . "</p>";
                                    //echo "<p> PVP: " . $row["pvp"] . "€" . "</p>";     
                                    echo "</li>";
                                    }
                                    ?>     
                    </ul>    
                </article>
            </div>
                
            <?php } else { ?>
            <div class="center"> 
                <article>
                    
                <?php 
                $res = mysql_query("SELECT direccion, telefono, correo, imagen3, imagen4 FROM general WHERE id='1'", $conn);
                $row = mysql_fetch_array($res);
                echo "<a href='". BASE_URL . "hombre?cat=1'><img class='novedad' title='sdf' src='userfiles/large/". $row["imagen3"] . "' alt='sdf'></a>"; 
                ?>
                    
                </article>
            </div>
            <?php } ?>
            
        </div>
        
        <footer>
            <div class="center">
                <?php 
                $res = mysql_query("SELECT direccion, telefono, correo FROM general WHERE id='1'", $conn);
                $row = mysql_fetch_array($res);
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
