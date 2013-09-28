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
			
			<h1><?php echo _("Puntuaciones"); ?></h1>
			
			<p><?php echo _("A continuación se muestran las notas de todos los usuarios que han realizado alguna prueba de test."); ?></p>
			
			<?php
				
				// create a database connection, using the constants from config/db.php (which we loaded in index.php)
	            $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	            // if no connection errors (= working database connection)
	            if (!$db_connection->connect_errno) {
	
	                // escape the POST stuff
	                //$this->user_name = $this->db_connection->real_escape_string($_POST['user_name']);
	                // database query, getting all the info of the selected user
	                
	                $checklogin = $db_connection->query("SELECT * FROM users INNER JOIN tests ON users.user_id=tests.user_id ORDER BY points DESC;");
	
	
					echo '<table class="table table-bordered">';
						
						echo "<tr>";
							echo "<th>"._("Usuario")."</th>";
							echo "<th>"._("Archivo")."</th>";
							echo "<th>"._("Fecha")."</th>";	
							echo "<th>"._("Puntos obtenidos")."</th>";	
							echo "<th>"._("Puntos totales")."</th>";
						echo "<tr>";
						
					while ($array = $checklogin->fetch_object()) {
					
						echo "<tr>";
						
								echo "<td>";
									
									echo $array->user_name;
						
								echo "</td>";
					
								echo "<td>";
									
									echo $array->file;
						
								echo "</td>";
								
								echo "<td>";
									
									echo $array->date;
						
								echo "</td>";
								
								echo "<td>";
						
									echo $array->points;
						
								echo "</td>";
								
								echo "<td>";
									
									echo $array->total_points;
						
								echo "</td>";
						
						echo "</tr>";
					}

	                echo "</table>";
	                
	                
	            } else {
	                $this->errors[] = "Database connection problem.";
	            }
			
			?>
		</div>
		
		<div class="col-md-4">
			<h3><?php echo _("Ayuda"); ?></h3>
			<p><?php echo _("Introduce tu nombre de usuario y contraseña para acceder al sistema."); ?></p>
			<p><?php echo _("¿Todavía no tienes una cuenta? <a href=\"./register\" title=\"Crear una nueva cuenta\">Puedes crearla desde aquí.</a>"); ?></p>
		</div>
	</div>
<?php require_once("./footer.php"); ?>