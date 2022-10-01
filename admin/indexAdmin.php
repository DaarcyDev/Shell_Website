<?php
  require '../includes/funciones.php';
  incluirTemplate('circleMenu');

?>
<div class="container">
  <div id="about" class="crud">
    <div class="content-crud crud">
      <div class="crud-content-text">
        <div class="title-crud">
          <h2>crud</h2>
        </div>
        <div class="buttons-crud">
          <a href="/admin/properties/newsAdmin.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso">
                    <h2>News</h2>
                </li>
              </ul>
            </a>
            <a href="/admin/properties/aboutAdmin.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso">
                    <h2>About</h2>
                </li>
              </ul>
            </a>
            <a href="/admin/properties/discAdmin.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso">
                    <h2>Discography</h2>
                </li>
              </ul>
            </a>
            <a href="/admin/properties/merchAdmin.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso">
                    <h2>Merch</h2>
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
<?php incluirTemplate('footer'); ?>