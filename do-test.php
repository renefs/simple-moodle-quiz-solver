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
			
			<form class="quiz-form" method="post" action="./resolve-test.php" role="form">
			
			<?php 
			// ... ask if we are logged in here:
			if ($login->isUserLoggedIn() == true) { ?>
			
				<?php
					
					$quizFile="quiz.xml";
					
					if(isset($_POST['upload_xml']) && stripslashes($_POST['upload_xml']=='3d22f3e85803089360bddc2dac2d39fe')){
						$allowedExts = array("xml");
						$temp = explode(".", $_FILES["fileXML"]["name"]);
						$extension = end($temp);
						if ((($_FILES["fileXML"]["type"] == "text/xml") && ($_FILES["fileXML"]["size"] < 500000) && in_array($extension, $allowedExts)))
						  {
						  if ($_FILES["fileXML"]["error"] > 0)
						    {
						    echo "Error: " . $_FILES["file"]["error"] . "<br>";
						    }
						  else
						    {
						    
						    
						    echo '<h2>Cargando fichero xml...</h2>';
						    
						    echo '<div class="alert alert-success">'._('El archivo xml se ha cargado correctamente.').'</div>';
						    
						    echo '<ul>';
						    echo '<li>'._('Nombre: '). $_FILES["fileXML"]["name"] . '</li>';
						    echo '<li>'._('Tipo: ') . $_FILES["fileXML"]["type"] . '</li>';
						    echo '<li>'._('Tamaño: ') . ($_FILES["fileXML"]["size"] / 1024) . ' kb</li>';
						    echo '<li>'._('Almacenado en: ') . $_FILES["fileXML"]["tmp_name"].'</li>';
						    echo '</ul>';
						    
						    $quizFile=$_FILES["fileXML"]["tmp_name"];
						    
						    }
						  }else{
						  	echo '<div class="alert alert-danger">'._('<strong>Archivo no válido.</strong> Se cargará QuizXML.xml por defecto.').'</div>';
						}
					}else{
						
						echo '<h2>'._('Cargando fichero xml por defecto...').'</h2>';
						
					}					
					
					 $doc = new DomDocument();
					 $doc->load($quizFile);
					
					 $xsl = new DOMDocument();
					 $xsl->load("quiz.xsl");
					
					 $xsltproc = new XSLTProcessor();
					 $xsltproc->importStylesheet($xsl);
					 
					 $newDoc = $xsltproc->transformToDoc($doc); 
					
					 echo $newDoc->saveXML();
				?>
				<button type="submit" class="btn btn-primary"><?php echo _('Corregir examen'); ?></button>
			
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