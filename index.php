<?php
include("includes/general_settings.php");
include("includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Between</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    
    

  </head>

  <body>
      
      <?php session_start(); ?>

    <div class="container">

      <form class="form-inici" action="" method="post">
        <h2 class="form-signin-heading logo"></h2>
        <input type="text" class="form-control" placeholder="Usuario" name="username" id="username" autofocus>
        <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" >

        <button class="btn btn-lg btn-primary btn-block" type="button" id="enviar" onclick="presionSubmit()">Entrar</button>
      </form>
        <div class="textoabajo">
        <p>
        <? 
        $res = mysql_query("SELECT texto_login FROM general WHERE id='1'", $conn);
        echo mysql_result($res, 0);
        ?>
        </p>
        </div>
        
<!--       $res = mysql_query("SELECT text1 FROM general WHERE id='1'", $conn);
       echo mysql_result($res, 0); -->

    </div> <!-- /container -->

    
  <script type="text/javascript" src="js/login.js"></script> 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  </body>
</html>
