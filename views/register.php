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
			<h1>Registro</h1>
			<!-- register form -->
			<form method="post" action="register.php" name="registerform" class="form-horizontal" role="form">
			    
			    <div class="form-group">
			    	<!-- the user name input field uses a HTML5 pattern check -->
					<label for="login_input_username" class="col-lg-2 control-label">Usuario</label>
					<div class="col-lg-10">
						<input id="login_input_username" class="login_input form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
						<span class="help-block">(only letters and numbers, 2 to 64 characters)</span>
					</div>
			    </div>
			    
			    <div class="form-group">
			    	<!-- the email input field uses a HTML5 email type check -->
					<label for="login_input_email" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input id="login_input_email" class="login_input form-control" type="email" name="user_email" required /> 
					</div> 
			    </div>      
			    
			    <div class="form-group">
			    	<label for="login_input_password_new" class="col-lg-2 control-label">Contraseña</label>
			    	<div class="col-lg-10">
						<input id="login_input_password_new" class="login_input form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
						<span class="help-block">(min. 6 characters)</span>
					</div>
			    </div>
			    
			    <div class="form-group">
			    	<label for="login_input_password_repeat" class="col-lg-2 control-label">Repetir contraseña</label>
			    	<div class="col-lg-10">
						<input id="login_input_password_repeat" class="login_input form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
			    	</div>
			    </div>
			    
			    <div class="form-group">
			    	<div class="col-lg-10">
			    		<button type="submit"  name="register" class="btn btn-success">Regístrame</button>
			    	</div>
			    </div>
			    
			</form>
		</div>
		
		<div class="col-md-4">
			<h3>Ayuda</h3>
			<p>Introduce tu nombre de usuario y contraseña para acceder al sistema.</p>
			<p>¿Todavía no tienes una cuenta? <a href="./register" title="Crear una nueva cuenta">Puedes crearla desde aquí.</a></p>
		</div>
	</div>
<?php require_once("./footer.php"); ?>