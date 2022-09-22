<?php
// lo que hace "?? null" es para asignarle un valor nulo
$resultado = $_GET['resultado']?? null;

require '../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
  <div id="about" class="crud">
    <div class="content-crud newsAdmin">
      <div class="crud-content-text">
        <div class="title-crud">

          <h2>News Admin</h2>

        </div>


        <div class="buttons-crud">
          <a href="/admin/properties/newsAdminCrud/create.php">
            <ul class="lineas_cont">
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <li class="widget-curso">
                <h2>Create</h2>
              </li>
            </ul>
          </a>
          <a href="/admin/properties/newsAdminCrud/read.php">
            <ul class="lineas_cont">
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <li class="widget-curso">
                <h2>Read</h2>
              </li>
            </ul>
          </a>
          <a href="/admin/properties/newsAdminCrud/update.php">
            <ul class="lineas_cont">
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <li class="widget-curso">
                <h2>Update</h2>
              </li>
            </ul>
          </a>
          <a href="/admin/properties/newsAdminCrud/delete.php">
            <ul class="lineas_cont">
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <span class="linea"></span>
              <li class="widget-curso">
                <h2>Delete</h2>
              </li>
            </ul>
          </a>

        </div>

        <?php if ($resultado) : ?>
          <div class="alert">
            <div class="fineAlert">
            <p> Anuncio Creado Correctamente </p>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="button-cont">
        <a href="/admin/indexAdmin.php" class="button"><span class="button_top"> Back</span></a>
      </div>
    </div>
  </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>