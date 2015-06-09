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

        <?php
        
        $sexo=$_GET["s"];
        $id_pro=$_GET["id"];
        $cat=$_GET["cat"];
        
        ?>
        <header>
            <div class="center">          
                <nav>      
                    <ul>
                        <?php if($sexo=="hombre"){?>
                        <li class="active"><a title="" href="<?php echo BASE_URL . "hombre"?>">HOMBRE</a></li>
                        <li><a title="" href="<?php echo BASE_URL . "mujer"?>">MUJER</a></li>
                        <?php }else{ ?>
                        <li><a title="" href="<?php echo BASE_URL . "hombre"?>">HOMBRE</a></li>
                        <li  class="active"><a title="" href="<?php echo BASE_URL . "mujer"?>">MUJER</a></li>
                        <?php }?>
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
                    $query = "SELECT id, nombre FROM cat_$sexo ";
                    $result = mysql_query($query);
                    
                    if (isset($_GET["cat"]))
                        $cat=$_GET["cat"];
                    
                    while ($row = mysql_fetch_array($result)) 
                    {
                    $nombre=$row["nombre"];
                    $id=$row["id"];
                    
                    if ($cat==$id)
                        echo "<li class='active'><a title='$nombre' href='" .  BASE_URL . "$sexo?cat=$id'>$nombre</a></li>";
                    else
                        echo "<li><a title='$nombre' href='" .  BASE_URL . "$sexo?cat=$id'>$nombre</a></li>";
                    }
                    ?>

                    </ul>
                </menu>
            </div>
            
            <div class="producto">
                <article>
                    
                    <?php
                    $query = "SELECT id, id_cat, modelo, color, tallas, precio_cost, pvp, descripcion, imagen FROM pro_$sexo WHERE id='$id_pro'";
                    $result = mysql_query($query);
                    //echo "<table>";
                    while ($row = mysql_fetch_array($result)) { ?>
                    <table>
                        <tr>  <td rowspan="6"><img class='bordeimagen' title='' src='img/nofoto.png' width='160' height='220'> </td> <td><strong>gdfd</strong></td> </tr>
                        <tr>  <td> Color: </td> </tr>
                        <tr>  <td> Tallas </td></tr>
                        <tr>  <td> Precio coste: </td></tr>
                        <tr>  <td> PVP: </td></tr>
                        <tr>  <td> Descripcion</td></tr>
                   </table>

                    <?}
                  //  echo "</table><br/>";
                    ?>  
                    
                    <?php
                    
                    if ($sexo==hombre)
                        $s=h;
                    elseif ($sexo==mujer)
                        $s=m;

                    $query = "SELECT imagen FROM imagenes WHERE id_pro='$id_pro' AND sexo='$s'";
                    $result = mysql_query($query);
                    echo "<ul>";
                    while ($row = mysql_fetch_array($result)) {
                        echo "<li><figure><img class='bordeimagen' src='userfiles/$s/$id_pro/" . $row["imagen"]. "' alt='px' width='160' height='220'></img></figure></li>" ; 
                    }
                    echo "</ul>";
                    ?>
                    
                </article>
            </div>
                
            
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
