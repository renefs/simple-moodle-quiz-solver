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
			
			<h1><?php echo _("Hacer un test"); ?></h1>
			
			<?php 
			// ... ask if we are logged in here:
			if ($login->isUserLoggedIn() == true) { ?>
			
				 <?php
				 	//print_r($_POST);
				 	$arrayKeys = array_keys($_POST);
				 	
				 	$identifiers = array();
				 	
				 	foreach($arrayKeys as $key){
					 	
					 	$key = explode("_", $key);
					 	
					 	//Se obtiene el 2
					 	
					 	$identifiers[]=$key[1];
					 	
				 	}
				 	
				 	$identifiers = array_unique($identifiers);
				 	
				 	//print_r($identifiers);
				 	$points=0;
				 	$totalCorrectPoints=0;
				 	
				 	foreach($identifiers as $identifier){
				 		
				 		echo "<p><strong>".$_POST['questiontext_'.$identifier]."</strong></p>";
				 		
				 		if(isset($_POST['select_'.$identifier])){
				 		
				 			$prefix = '<p>';
				 			$sufix = '</p>';
				 			
				 			if (substr($_POST['correct_'.$identifier], 0, strlen($prefix)) == $prefix) {
					 			$_POST['correct_'.$identifier] = substr($_POST['correct_'.$identifier], strlen($prefix));
					 		}
					 		
					 		if (substr($_POST['correct_'.$identifier], 0, strlen($sufix)) == $sufix) {
					 			$_POST['correct_'.$identifier] = substr($_POST['correct_'.$identifier], strlen($sufix));
					 		}
					 		
					 		if (substr($_POST['select_'.$identifier], 0, strlen($prefix)) == $prefix) {
					 			$_POST['select_'.$identifier] = substr($_POST['select_'.$identifier], strlen($prefix));
					 		}
					 		
					 		if (substr($_POST['select_'.$identifier], 0, strlen($sufix)) == $sufix) {
					 			$_POST['select_'.$identifier] = substr($_POST['select_'.$identifier], strlen($sufix));
					 		}
				 		
				 		
					 		if($_POST['select_'.$identifier] == $_POST['correct_'.$identifier]){
					 			echo "<p class='text-success'><em>Seleccionada</em>: ".$_POST['select_'.$identifier]."</p>";
					 			echo "<p class='text-success'><em>Correcta</em>: ".$_POST['correct_'.$identifier]."</p>";
					 		}else{
						 		echo "<p class='text-danger'><em>Seleccionada</em>: ".$_POST['select_'.$identifier]."</p>";
					 			echo "<p class='text-danger'><em>Correcta</em>: ".$_POST['correct_'.$identifier]."</p>";
					 		}
					 		
					 		if($_POST['select_'.$identifier] == $_POST['correct_'.$identifier]){
					 		
					 			echo "<p class='text-success'><em>Puntuación</em>: ".$_POST['fraction_'.$identifier.'_correct']."</p>";
					 			$points+=$_POST['fraction_'.$identifier.'_correct'];
					 		
					 		}else{
					 			echo "<p class='text-danger'><em>Puntuación</em>: ".$_POST['fraction_'.$identifier.'_incorrect']."</p>";
					 			$points+=$_POST['fraction_'.$identifier.'_incorrect'];
				 		}
					 		
					 	}else{
						 	
						 	echo "<p class='text-warning'><em>Correcta</em>: ".$_POST['correct_'.$identifier]."</p>";
						 	echo "<p class='text-warning'><em>Puntuación</em>: 0</p>";
					 	}				 	
				 		
				 		$totalCorrectPoints+=$_POST['fraction_'.$identifier.'_correct'];
				 		
				 	}
				 	
				 	echo "<p><em>".('PUNTUACIÓN TOTAL')."</em>: ".$points." / ". $totalCorrectPoints ."</p>";
				 	
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
		                
		                $insertQuery = "INSERT INTO tests (user_id,file,points,total_points) VALUES ('".$userId."','prueba.xml','".$points."','".$totalCorrectPoints."');";
		                
		                $checklogin = $db_connection->query($insertQuery);
		
		                if($checklogin){
			                
			                echo "<p class='alert alert-success'>"._('Se ha guardado el test')."</p>";
			                
		                }else{
			                echo "<p class='alert alert-danger'>"._('No se ha guardado el test')."</p>";
		                }
		                
		            } else {
		                $this->errors[] = "<p class='alert alert-danger'>"._('Problema de conexión con la base de datos')."</p>";
		            }
				 	
				 	
				 	
				 ?>			
			
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