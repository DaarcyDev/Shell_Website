<?php
  require '../../includes/funciones.php';

  incluirTemplate('circleMenu');

?>
<div class="container">
  <div id="about" class="crud">
    <div class="content-crud discAdmin">
      <div class="crud-content-text">
        <div class="title-crud">
          <h2>Discography Admin</h2>
        </div>
        <div class="buttons-crud">
          <a href="/admin/properties/discAdminCrud/create.php">
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
            <a href="/admin/properties/discAdminCrud/read.php">
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
            <a href="/admin/properties/discAdminCrud/update.php">
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
            <a href="/admin/properties/discAdminCrud/delete.php">
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
      </div>
      <div class="button-cont">
        <a href="/admin/indexAdmin.php" class="button"><span class="button_top"> Back</span></a>
      </div>
    </div>
  </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>