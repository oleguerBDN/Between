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
        <script type="text/javascript" src="paging.js"></script>


    </head>

    <body>
        
        <?php
        
        session_start();
        
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
                            <li  class="active"><a href="general.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">General</span></a></li>	
                            <li><a href="categoriash.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Categorías<br/>Hombre</span></a></li>
                            <li><a href="categoriasm.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Categorías<br/>Mujer</span></a></li>                            
                            <li><a href="productosh.php"><i class="fa-icon-hdd"></i><span class="hidden-tablet">Productos<br/>Hombre</span></a></li>
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
                        <div class="box span10">
                                                  
                           <?php 
                               $query = "SELECT direccion, telefono, texto_login, correo, imagen1, imagen2, imagen3, imagen4 FROM general WHERE id='1' ";
                               $result = mysql_query($query);
                                    
                                    while($row = mysql_fetch_array($result))
                                    {
                               
                               ?>
                            
                            <fieldset>
                                    <!-- Form Name -->
                                    <tr>
                                        <legend>Información General</legend>

                                    <!-- Button -->
                                    <form enctype="multipart/form-data" action="<?php echo BASE_URL . "admin/dal/general_db.php"?>" method="post">
                                        <table>
                                            
                                                <tr><td><label class="control-label" for="direccion"><b>Direccion</b></label></td>
                                                <td><input id="direccion" name="direccion" type="text" class="input-xlarge" value="<?php echo $row['direccion'] ?>" placeholder="Añadir dirección..."> </td></tr>
                                                
                                                
                                                <tr><td><label class="control-label" for="correo"><b>Email</b></label></td>
                                                <td><input id="correo" name="correo" type="text" class="input-large" value="<?php echo $row['correo'] ?>" placeholder="Añadir email..."> </td></tr>
                                                
                                                
                                                <tr><td><label class="control-label" for="telefono"><b>Teléfono</b></label></td>
                                                <td><input id="telefono" name="telefono" type="text" class="input-large" value="<?php echo $row['telefono'] ?>" placeholder="Añadir dirección..."> </td></tr>
        
                                                <tr>
                                                    <td><label for="texto_login"><b>Texto Login</b></label></td> 
                                                    <td><textarea id="texto_login" name="texto_login" rows="10"><?php echo $row["texto_login"] ?></textarea></td> 
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><label for="imagen1"><b>Imagen Inicio Hombre </b> (Recomendable 470 x 390 px)</label></td> 
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><input type="file" name="imagen1" id="imagen1"></td>
                                                    <td><img src='../userfiles/thumbnail/<?php echo $row['imagen1'] ?>'></img></td>
                                                </tr>
                                                <tr><td><br/></td><td><br/></td></tr>
                                                <tr>
                                                    <td colspan="2"><label for="imagen2"><b>Imagen Inicio Mujer </b> (Recomendable 470 x 390 px)</label></td> 
                                                    <td></td>
                                                </tr>  
                                                <tr>
                                                    <td><input type="file" name="imagen2" id="imagen2"></td>
                                                    <td><img src='../userfiles/thumbnail/<?php echo $row['imagen2'] ?>'></img></td>
                                                </tr>
                                                <tr><td><br/></td><td><br/></td></tr>
                                                <tr>
                                                    <td colspan="2"><label for="imagen3"><b>Imagen Novedades Hombre </b> (Recomendable 745 x 485 px)</label></td> 
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="file" name="imagen3" id="imagen3"></td>
                                                    <td><img src='../userfiles/thumbnail/<?php echo $row['imagen3'] ?>'></img></td>
                                                </tr>
                                                <tr><td><br/></td><td><br/></td></tr>
                                                <tr>
                                                    <td colspan="2"><label for="imagen4"><b>Imagen Novedades Mujer </b> (Recomendable 745 x 485 px)</label></td> 
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="file" name="imagen4" id="imagen4"></td>
                                                    <td><img src='../userfiles/thumbnail/<?php echo $row['imagen4'] ?>'></img></td>
                                                </tr>
                                                <tr><td><br/></td><td><br/></td></tr>
                                                <tr><td><button type="submit" id="submit" name="Submit" class="btn btn-success">Guardar</button></td></tr>
                                                                                        
                                        </table>
                                    </form>
                            </fieldset>
                            
                            <?php } ?>
                            
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
            
            <script type="text/javascript">
                    var pager = new Pager('resultados', 11);
                    pager.init();
                    pager.showPageNav('pager', 'NavPosicion');
                    pager.showPage(1);
            </script>
            
            
            <!-- end: JavaScript-->

    </body>
</html>

