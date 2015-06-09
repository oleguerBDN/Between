<?php
include("../includes/general_settings.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="ACME Dashboard Bootstrap Admin Template.">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="ACME, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->
        <!-- start: CSS -->
        <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <link id="ie-style" href="css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
                <link id="ie9style" href="css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- end: Favicon -->

    </head>

    <body>
        
        <?php
        
        if (!isset($_SESSION['public_user'])) {
            echo "No hay sesion abierta.";
            header("location: " . BASE_URL . "admin/index.php");
        }
        ?>   

        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php BASE_URL . "admin/index.php" ?>"><span>Página de administración | Between</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">

                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo "  -  " . $_SESSION['public_user']['nombre'] ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo BASE_URL . "admin/index.php" ?>"><i class="halflings-icon white off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span1">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="general.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">General</span></a></li>	
                            <li><a href="categoriash.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Categorías<br/>Hombre</span></a></li>
                            <li><a href="categoriasm.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Categorías<br/>Mujer</span></a></li>
                            <li class="active"><a href="productosh.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Productos<br/>Hombre</span></a></li>
                            <li><a href="productosm.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Productos<br/>Mujer</span></a></li>
                            <li><a href="usuarios.php"><i class="fa-icon-lock"></i><span class="hidden-tablet"> Usuarios</span></a></li>
                            <li><a href="index.php"><i class="fa-icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->


                <!-- start: Content -->
                <div id="content" class="span11">

                    <div class="row-fluid" >
                        <div class="box span12">

                            

                            <?php if (!isset($_GET["id"])) {?>
                                <fieldset>
                                    <!-- Form Name -->
                                        <legend>Añadir Producto</legend>

                                    <!-- Button -->
                                    <form enctype="multipart/form-data" action="<?php echo BASE_URL . "admin/dal/pro_hombre_db.php"?>" method="post">
                                        <table>
                                            
                                            <div class="controls"> 
                                                <tr>
                                                    <td><label for="modelo"><b>Modelo</b></label></td> 
                                                    <td><input id="modelo" name="modelo" type="text" class="input-large" value=""></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="color"><b>Color</b></label></td> 
                                                    <td><input id="color" name="color" type="text" class="input-large" value=""></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="tallas"><b>Tallas</b></label></td> 
                                                    <td><input id="tallas" name="tallas" type="text" class="input-large" value=""></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="precio_cost"><b>P.Coste</b></label></td> 
                                                    <td><input id="precio_cost" name="precio_cost" type="text" class="input-large" value=""></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="pvp"><b>PVP</b></label></td> 
                                                    <td><input id="pvp" name="pvp" type="text" class="input-large" value=""></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="descripcion"><b>Descripción</b></label></td> 
                                                    <td><textarea id="descripcion" name="descripcion" rows="10"></textarea></td> 
                                                </tr>
                                                
                                                <tr>
                                                    <td><label><b>Categoría</b></label></td>
                                                    <td>
                                                        
                                                        <select name="id_cat">

                                                          <?php
                                                            $query = "SELECT id, nombre FROM cat_hombre ";
                                                            $result = mysql_query($query);
                                                            
                                                            while ($row = mysql_fetch_array($result)) {
                                                                $nombre=$row["nombre"];
                                                                $id=$row["id"];
                                                                
                                                                echo "<option value='$id'>$nombre</option>";
                                                            }
                                                            ?>
               
                                                        </select> 

                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="imagen"><b>Imagen</b></label></td> 
                                                    <td><input type="file" name="imagen" id="imagen"> Recomendable <b>380 x 520 px</b></td>
                                                </tr>
                                                
                                                
                                                <tr><td><button type="submit" id="submit" name="Submit" class="btn btn-success">Añadir</button></td></tr>
                                            </div>
                                            </table>
                                    </form>
                                </fieldset>
                                    
                                    <p><br/><br/></p>                        
                                   <div class=" span11">
                                       <fieldset>
                                           <legend>Lista Productos Hombre</legend> 
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable"> 
                                    <thead>
                                        <tr>
					  <th>Modelo</th>
                                          <th>Color</th>
                                          <th>Tallas</th>
                                          <th>P.Coste</th>
                                          <th>PVP</th>
                                          <th>Categoría</th>
                                          <th>Descripción</th>
                                          <th>Imagen</th>
                                          <th>Editar</th>
                                          <th>Fotos</th>
                                          <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                    $query = "SELECT id, id_cat, modelo, color, tallas, precio_cost, pvp, descripcion, imagen FROM pro_hombre ";
                                    $result = mysql_query($query);
                                    $numero = 0; 
                                    
                                    while($row = mysql_fetch_array($result))
                                    {
                                    $id = $row["id"];
                                    $id_cat = $row["id_cat"];
                                    $res = mysql_query("SELECT nombre FROM cat_hombre WHERE id='$id_cat'", $conn);
                                    
                                    echo "<tr><td><font face=\"verdana\">" . $row["modelo"] . "</font></td>";
                                    echo "<td><font face=\"verdana\">" . $row["color"] . "</font></td>";
                                    echo "<td><font face=\"verdana\">" . $row["tallas"] . "</font></td>";
                                    echo "<td><font face=\"verdana\">" . $row["precio_cost"] . "€" . "</font></td>";
                                    echo "<td><font face=\"verdana\">" . $row["pvp"] . "€" . "</font></td>";              
                                    echo "<td><font face=\"verdana\">" . mysql_result($res, 0) . "</font></td>";
                                    echo "<td><font face=\"verdana\">" . $row["descripcion"] . "</font></td>"; 
                                    echo "<td><img src='../userfiles/thumbnail/" . $row["imagen"]. "' alt='px' width='50' height='50'></img>" ; 
                                
                                    echo "<td align='center'><a class='btn btn-info' href='" . BASE_URL . "admin/productosh.php?id=$id" . "'> <i class='halflings-icon edit halflings-icon'></i></a></td>";
                                    echo "<td align='center'><a class='btn btn-success' href='" . BASE_URL . "admin/img.php?id=$id&s=h" . "'> <i class='halflings-icon camera halflings-icon'></i></a></td>";
                                    echo "<td align='center'><a class='btn btn-danger' href='" . BASE_URL . "admin/dal/pro_hombre_db.php?id=$id" . "'> <i class='halflings-icon trash halflings-icon'></i></a></td></tr>";
                                    
                                    $numero++;
                                    }
                                    ?>
                                    </tbody>   
                                    </table>
                                    </fieldset> 
                                   </div>
                                   </div> 
                                      
                          
<!--ESTA ES LA PARTE PARA EDITAR UN FORMULARIO (SOLO SE MUESTRA SI SE PASA UNA ID POR GET) -->

                            <?php } elseif (isset($_GET["id"])) { ?>
          
                                    <fieldset>
                                    <!-- Form Name -->
                                    <tr>
                                        <legend>Productos Hombre</legend>

                                    <!-- Button -->
                                    <form enctype="multipart/form-data" action="<?php echo BASE_URL . "admin/dal/pro_hombre_db.php"?>" method="post">
                                        <table>
                                            
                                            <div class="controls"> 
                                                
                                           <?php
                                    
                                    $id = $_GET["id"];
                                    $query = "SELECT id, id_cat, modelo, color, tallas, precio_cost, pvp, descripcion, imagen FROM pro_hombre WHERE id='$id' ";
                                    $result = mysql_query($query);
                                    $numero = 0; 
                                    
                                    while($row = mysql_fetch_array($result))
                                    {
                                    //$id = $row["id"];
                                    $id_cat = $row["id_cat"];
                                    //$res = mysql_query("SELECT nombre FROM cat_hombre WHERE id='$id_cat'", $conn);
                                    ?>
                                                
                                                <tr>
                                                    <td></td> 
                                                    <td><input id="id" name="id" type="hidden" class="input-large" value="<?php echo $id ?>"></td> 
                                                </tr>                           
                                                <tr>
                                                    <td><label for="modelo"><b>Modelo</b></label></td> 
                                                    <td><input id="modelo" name="modelo" type="text" class="input-large" value="<?php echo $row["modelo"] ?>"></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="color"><b>Color</b></label></td> 
                                                    <td><input id="color" name="color" type="text" class="input-large" value="<?php echo $row["color"] ?>"></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="tallas"><b>Tallas</b></label></td> 
                                                    <td><input id="tallas" name="tallas" type="text" class="input-large" value="<?php echo $row["tallas"] ?>"></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="precio_cost"><b>P.Coste</b></label></td> 
                                                    <td><input id="precio_cost" name="precio_cost" type="text" class="input-large" value="<?php echo $row["precio_cost"] ?>"></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="pvp"><b>PVP</b></label></td> 
                                                    <td><input id="pvp" name="pvp" type="text" class="input-large" value="<?php echo $row["pvp"] ?>"></td> 
                                                </tr>
                                                <tr>
                                                    <td><label for="imagen"><b>Imagen</b></label></td> 
                                                    <td><input type="file" name="imagen" id="imagen"> <img src='../userfiles/thumbnail/<?php echo $row["imagen"];?>'></img</td> 
                                                </tr>
                                                
                                                <tr>
                                                    <td><label for="descripcion"><b>Descripción</b></label></td> 
                                                    <td><textarea id="descripcion" name="descripcion" rows="10"><?php echo $row["descripcion"] ?></textarea></td> 
                                                </tr>
                                                
                                                <tr>
                                                    <td><label><b>Categoría</b></label></td>
                                                    <td>
                                                        
                                                        <select name="id_cat">

                                                          <?php
                                                            $query = "SELECT id, nombre FROM cat_hombre ";
                                                            $result = mysql_query($query);
                                                            
                                                            while ($row = mysql_fetch_array($result)) {
                                                                $nombre=$row["nombre"];
                                                                $id=$row["id"];
                                                                if ($id==$id_cat)
                                                                {
                                                                echo "<option value='$id' selected>$nombre</option>";    
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='$id'>$nombre</option>";
                                                                }
                                                            }
                                                            ?>
               
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <tr><td><button type="submit" id="submit" name="Submit" class="btn btn-default">Guardar cambios</button></td></tr>
                                            </div>
                                            
                                        </table>
                                    </form>
                                    </fieldset>
          
                            <?php }} ?>
                                    
                                    </div>
                    </div>

                </div><!--/#content.span10-->
                <!-- end: Content -->


            </div><!--/.fluid-container-->

            <!-- start: JavaScript-->

            <script src="js/jquery-1.9.1.min.js"></script>
            <script src="js/jquery-migrate-1.0.0.min.js"></script>

            <script src="js/jquery-ui-1.10.0.custom.min.js"></script>

            <script src="js/jquery.ui.touch-punch.js"></script>

            <script src="js/modernizr.js"></script>

            <script src="js/bootstrap.min.js"></script>

            <script src="js/jquery.cookie.js"></script>

            <script src='js/fullcalendar.min.js'></script>

            <script src='js/jquery.dataTables.min.js'></script>

            <script src="js/excanvas.js"></script>
            <script src="js/jquery.flot.js"></script>
            <script src="js/jquery.flot.pie.js"></script>
            <script src="js/jquery.flot.stack.js"></script>
            <script src="js/jquery.flot.resize.min.js"></script>

            <script src="js/jquery.chosen.min.js"></script>

            <script src="js/jquery.uniform.min.js"></script>

            <script src="js/jquery.cleditor.min.js"></script>

            <script src="js/jquery.noty.js"></script>

            <script src="js/jquery.elfinder.min.js"></script>

            <script src="js/jquery.raty.min.js"></script>

            <script src="js/jquery.iphone.toggle.js"></script>

            <script src="js/jquery.uploadify-3.1.min.js"></script>

            <script src="js/jquery.gritter.min.js"></script>

            <script src="js/jquery.imagesloaded.js"></script>

            <script src="js/jquery.masonry.min.js"></script>

            <script src="js/jquery.knob.modified.js"></script>

            <script src="js/jquery.sparkline.min.js"></script>

            <script src="js/counter.js"></script>

            <script src="js/retina.js"></script>

            <script src="js/custom.js"></script>
                    
            <!-- end: JavaScript-->

    </body>
</html>

