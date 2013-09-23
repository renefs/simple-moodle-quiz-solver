<?php
include("./config/load-language.php");

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

</head>
<body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
        	<li <?php if(basename($_SERVER['PHP_SELF']) == "professor.php"){ echo 'class="active"';} ?>><a href="./restricted"><?php echo _("Área privada"); ?></a></li>
			<li <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){ echo 'class="active"';} ?>><a href="./"><?php echo _("Inicio"); ?></a></li>
          <?php 
			// ... ask if we are logged in here:
			if (!$login->isUserLoggedIn() == true) { ?>
				<li <?php if(basename($_SERVER['PHP_SELF']) == "register.php"){ echo 'class="active"';} ?>><a href="./register" ><?php echo _("Registrarse"); ?></a></li>
				<li <?php if(basename($_SERVER['PHP_SELF']) == "login.php"){ echo 'class="active"';} ?>><a href="./login"><?php echo _("Acceso"); ?></a></li>
			<?php }else{ ?>
				<li <?php if(basename($_SERVER['PHP_SELF']) == "login.php"){ echo 'class="active"';} ?>><a href="./login"><?php echo _("Tu cuenta"); ?></a></li>
				<li><a href="?logout"><?php echo _("Salir"); ?></a></li>
			<?php } ?>
        </ul>
        <h3 class="text-muted"><?php echo _("Máster Ing. Web - Uniovi"); ?></h3>
      </div>