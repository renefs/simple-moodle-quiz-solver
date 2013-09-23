<?php require_once("./header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div>
			   Esta es la pantalla de cuenta del usuario.
			</div>
		</div>
	<div class="col-md-4">
			<p>
			    <!-- if you need user information, just put them into the $_SESSION variable and output them here -->
			    Hola, <?php echo $_SESSION['user_name']; ?>.
			    Has iniciado sesión.
			    Puedes cerrar la sesión <a href="./?logout" title="Cerrar sesión"?>pulsando aquí</a>.
			</p>
		</div>
	</div>
<div>
    <!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
</div>
<?php require_once("./footer.php"); ?>