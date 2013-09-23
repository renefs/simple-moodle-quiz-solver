<?php

if(basename($_SERVER['PHP_SELF']) != "login.php"){
	// include the configs / constants for the database connection
	require_once("config/db.php");
	
	// load the login class
	require_once("classes/Login.php");
	
	// create a login object. when this object is created, it will do all login/logout stuff automatically
	// so this single line handles the entire login process. in consequence, you can simply ...
	$login = new Login();
}
?>
<!Doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Práctica de PHP de Lenguajes y estándares de la web." />
    <meta name="author" content="René Fernández" />
    
    <link rel="stylesheet" href="css/style.css" />
    
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"/>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){ echo 'class="active"';} ?>><a href="./">Inicio</a></li>
          <?php 
			// ... ask if we are logged in here:
			if (!$login->isUserLoggedIn() == true) { ?>
				<li <?php if(basename($_SERVER['PHP_SELF']) == "register.php"){ echo 'class="active"';} ?>><a href="./register" >Registrarse</a></li>
				<li <?php if(basename($_SERVER['PHP_SELF']) == "login.php"){ echo 'class="active"';} ?>><a href="./login">Acceso</a></li>
			<?php }else{ ?>
				<li <?php if(basename($_SERVER['PHP_SELF']) == "login.php"){ echo 'class="active"';} ?>><a href="./login">Tu cuenta</a></li>
				<li><a href="?logout">Salir</a></li>
			<?php } ?>
        </ul>
        <h3 class="text-muted">Máster Ing. Web - Uniovi</h3>
      </div>