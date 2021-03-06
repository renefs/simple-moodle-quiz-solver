<?php require_once("./header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2><?php echo _('Tu cuenta') ;?></h2>
			
			<p><?php echo _("A continuación se muestra un listado con todos los tests que has realizado y todas las notas que has obtenido."); ?></p>
			
			<?php
				
				// create a database connection, using the constants from config/db.php (which we loaded in index.php)
	            $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	            // if no connection errors (= working database connection)
	            if (!$db_connection->connect_errno) {
	
	                // escape the POST stuff
	                //$this->user_name = $this->db_connection->real_escape_string($_POST['user_name']);
	                // database query, getting all the info of the selected user
	                $userId = $db_connection->query("SELECT user_id FROM users WHERE user_name = '" . $_SESSION['user_name'] . "';");
	                 if ($userId->num_rows == 1) {

						 // get result row (as an object)
						 $result_row = $userId->fetch_object();
						 $userId = $result_row->user_id;
					}else{
						
						echo "Error al obtener el usuario";
						
					}
	                
	                $checklogin = $db_connection->query("SELECT date, file, points, total_points FROM tests WHERE user_id = '".$userId."';");
	
	
					echo '<table class="table table-bordered">';
						
						echo "<tr>";
							echo "<th>"._("Archivo")."</th>";
							echo "<th>"._("Fecha")."</th>";	
							echo "<th>"._("Puntos obtenidos")."</th>";	
							echo "<th>"._("Puntos totales")."</th>";
						echo "<tr>";
						
					while ($array = $checklogin->fetch_object()) {
					
						echo "<tr>";
					
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
			<p>
			    <!-- if you need user information, just put them into the $_SESSION variable and output them here -->
			    <?php echo _('Hola'); ?>, <?php echo $_SESSION['user_name']; ?>.
			    <?php echo _('Has iniciado sesión.'); ?>
			    <?php echo _('Puedes cerrar la sesión <a href="./?logout" title="Cerrar sesión"?>pulsando aquí</a>.'); ?>
			</p>
		</div>
	</div>
<div>
    <!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
</div>
<?php require_once("./footer.php"); ?>