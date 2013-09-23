<?php require_once("./header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<!-- errors & messages --->
			<?php
			
			// show negative messages
			if ($registration->errors) {
			    foreach ($registration->errors as $error) {
			        echo $error;    
			    }
			}
			
			// show positive messages
			if ($registration->messages) {
			    foreach ($registration->messages as $message) {
			        echo $message;
			    }
			}
			
			?>
			<!-- errors & messages --->
			<h1><?php echo _("Registro"); ?></h1>
			<!-- register form -->
			<form method="post" action="register.php" name="registerform" class="form-horizontal" role="form">
			    
			    <div class="form-group">
			    	<!-- the user name input field uses a HTML5 pattern check -->
					<label for="login_input_username" class="col-lg-2 control-label"><?php echo _("Usuario"); ?></label>
					<div class="col-lg-10">
						<input id="login_input_username" class="login_input form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
						<span class="help-block"><?php echo _("Sólo letras y números. De 2 a 64 caracteres."); ?></span>
					</div>
			    </div>
			    
			    <div class="form-group">
			    	<!-- the email input field uses a HTML5 email type check -->
					<label for="login_input_email" class="col-lg-2 control-label"><?php echo _("Email"); ?></label>
					<div class="col-lg-10">
						<input id="login_input_email" class="login_input form-control" type="email" name="user_email" required /> 
					</div> 
			    </div>      
			    
			    <div class="form-group">
			    	<label for="login_input_password_new" class="col-lg-2 control-label"><?php echo _("Contraseña"); ?></label>
			    	<div class="col-lg-10">
						<input id="login_input_password_new" class="login_input form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
						<span class="help-block"><?php echo _("Mín. 6 caracteres"); ?></span>
					</div>
			    </div>
			    
			    <div class="form-group">
			    	<label for="login_input_password_repeat" class="col-lg-2 control-label"><?php echo _("Repetir contraseña"); ?></label>
			    	<div class="col-lg-10">
						<input id="login_input_password_repeat" class="login_input form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
			    	</div>
			    </div>
			    
			    <div class="form-group">
			    	<div class="col-lg-10">
			    		<button type="submit"  name="register" class="btn btn-success"><?php echo _("Regístrame"); ?></button>
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
<?php require_once("./footer.php"); ?>