<?php require_once("./header.php"); ?>
      <div class="jumbotron">
        <h1><?php echo _("Módulo de PHP y XML"); ?></h1>
        <p class="lead"><?php echo _("Página de <strong>René Fernández Sánchez - UO179476</strong>, de la asignatura \"Lenguajes y estándares de la web\" del Máster de Ing. Web de Uniovi."); ?></p>
        <p><a class="btn btn-lg btn-success" href="./upload-test.php"><span class="glyphicon glyphicon-circle-arrow-up"></span> <?php echo _("Subir test en XML"); ?></a> <a class="btn btn-lg btn-primary" href="./do-test.php" title="Realizar test de ejemplo"><span class="glyphicon glyphicon-check"></span>  <?php echo _("Realizar test de ejemplo"); ?></a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4><?php echo _("Subir test en XML"); ?></h4>
          <p><?php echo _("Esta opción permite subir un test en formato XML para posteriormente realizarlo."); ?></p>

          <h4><?php echo _("Realizar test de ejemplo"); ?></h4>
          <p><?php echo _("Se utiliza para cargar automáticamente y realizar el test QuizXML.xml."); ?></p>

        </div>

        <div class="col-lg-6">
          <h4><?php echo _("Puntuaciones"); ?></h4>
          <p><?php echo _("Muestra un listado con las puntuaciones y tests realizados por los distintos usuarios, indicando la fecha de cada realización."); ?></p>

          <h4><?php echo _("Tu cuenta"); ?></h4>
          <p><?php echo _("Si te registras y realizas un test habiendo accedido a la página, las puntuaciones tests que realices podrán ser visualizados aquí."); ?></p>

        </div>
      </div>

<?php require_once("./footer.php"); ?>