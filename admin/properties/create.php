<?php

  require '../../includes/funciones.php';

  incluirTemplate('circleMenu');

?>
<div class="container">
  <div id="about" class="create">
    <div class="content-create">
      <div class="create-content-text">
        <div class="title-create">
          <h2>create</h2>
        </div>
        <div class="buttons-create">
          <a href="newsInfo.php">
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
            <a href="newsInfo.php">
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
            <a href="newsInfo.php">
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
            <a href="newsInfo.php">
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