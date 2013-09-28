<?php require_once("./header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2><?php echo _('Tu cuenta') ;?></h2>
			<?php
				
				var_dump($_SESSION);
				
				// create a database connection, using the constants from config/db.php (which we loaded in index.php)
	            $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	            // if no connection errors (= working database connection)
	            if (!$db_connection->connect_errno) {
	
	                // escape the POST stuff
	                //$this->user_name = $this->db_connection->real_escape_string($_POST['user_name']);
	                // database query, getting all the info of the selected user
	                $checklogin = $db_connection->query("SELECT user_name, user_email, user_password_hash FROM users WHERE user_name = 'rene';");
	
	                
	                
	                
	                
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