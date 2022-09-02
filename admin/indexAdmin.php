<?php
  require '../includes/funciones.php';

  incluirTemplate('circleMenu');

?>
<div class="container">
  <div id="about" class="crud">
    <div class="content-crud">
      <div class="crud-content-text">
        <div class="title-crud">
          <h2>crud</h2>
        </div>
        <div class="buttons-crud">
          <a href="#">
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
            <a href="#">
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
            <a href="#">
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
            <a href="#">
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
      <?php incluirTemplate('button-back'); ?>
    </div>
  </div>
</div>
<?php incluirTemplate('nav'); ?>
<script src="build/js/gallery.js"></script>
<?php incluirTemplate('footer'); ?>