<?php require_once("./header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<!-- errors & messages --->
			<?php
			
			// show negative messages
			if ($login->errors) {
			    foreach ($login->errors as $error) {
			        echo $error;    
			    }
			}
			
			// show positive messages
			if ($login->messages) {
			    foreach ($login->messages as $message) {
			        echo $message;
			    }
			}
			?>
			<!-- errors & messages --->
			<!-- login form box -->
			<h1><?php echo _("Acceso"); ?></h1>
			<form method="post" action="index.php" name="loginform" class="form-horizontal" role="form">
				
				<div class="form-group">
			    	<label for="login_input_username" class="col-lg-2 control-label"><?php echo _("Usuario"); ?></label>
				
					<div class="col-lg-10">
			    		<input id="login_input_username" class="login_input form-control" type="text" name="user_name" required />
					</div>
				</div>	
				<div class="form-group">
			    	<label for="login_input_password" class="col-lg-2 control-label"><?php echo _("Contraseña"); ?></label>
			    	
					<div class="col-lg-10">
			    		<input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" required />
					</div>
				</div>
			
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit"  name="login" class="btn btn-success"><?php echo _("Acceder"); ?></button>
					</div>
				</div>
			
			</form>
		</div>
		<div class="col-md-4">
			<h3><?php echo _("Ayuda"); ?></h3>
			<p><?php echo _("Introduce tu nombre de usuario y contraseña para acceder al sistema."); ?></p>
			<p><?php echo _("¿Todavía no tienes una cuenta? <a href=\"./register\" title=\"Crear una nueva cuenta\">Puedes crearla desde aquí.</a>"); ?></p>
		</div>		
	</div>
</div>
<?php require_once("./footer.php"); ?>