<?php
require '../includes/funciones.php';
$auth = autenticate();
if(!$auth){
    header('Location: /');
  }
  incluirTemplate('circleMenu');

// $idadmin = $_GET["idadmin"];
// $idadmin = filter_var($idadmin, FILTER_VALIDATE_INT); 

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
            <a href="/admin/properties/bannerAdmin.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso">
                    <h2>Banner</h2>
                </li>
              </ul>
            </a>
            <a href="/admin/properties/usersAdmin.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso">
                    <h2>Users</h2>
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