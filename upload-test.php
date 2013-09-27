<?php require_once("./header.php"); 


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
<div class="container">
	<div class="row">
		<div class="col-md-8">
			
			<h1><?php echo _("Subir un archivo test"); ?></h1>
			
			<?php 
			// ... ask if we are logged in here:
			if ($login->isUserLoggedIn() == true) { ?>
				<!-- register form -->
				<form method="post" action="/do-test.php" name="registerform" class="form-horizontal" role="form">
				    
				    <div class="form-group">
						<label for="exampleInputFile">Seleccionar archivo</label>
						<input type="file" id="exampleInputFile">
						<p class="help-block"><?php echo _('Elige un archivo de test de Moodle. Debe ser .xml.'); ?>.</p>
					</div>
				    
				    <div class="form-group">
				    	<div class="col-lg-10">
				    		<button type="submit"  name="register" class="btn btn-success"><?php echo _("Subir"); ?></button>
				    	</div>
				    </div>
				    
				</form>
			<?php }else{ ?>
					<p><?php echo _("Introduce tu nombre de usuario y contraseña para poder subir archivos."); ?></p>
					<p><?php echo _("¿Todavía no tienes una cuenta? <a href=\"./register\" title=\"Crear una nueva cuenta\">Puedes crearla desde aquí.</a>"); ?></p>
			<?php } ?>
		</div>
		
		<div class="col-md-4">
			<h3><?php echo _("Ayuda"); ?></h3>
			<p><?php echo _("Introduce tu nombre de usuario y contraseña para acceder al sistema."); ?></p>
			<p><?php echo _("¿Todavía no tienes una cuenta? <a href=\"./register\" title=\"Crear una nueva cuenta\">Puedes crearla desde aquí.</a>"); ?></p>
		</div>
	</div>
<?php require_once("./footer.php"); ?>