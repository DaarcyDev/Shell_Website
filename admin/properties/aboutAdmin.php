<?php

//importar conexion de la base de dato
require '../../includes/config/database.php';
$db = conectarDB();
//escribir el query
$query = "SELECT * FROM about";
// echo $query;
$result = mysqli_query($db, $query);
//consular la base de datos
$result2 = $_GET['resultado'] ?? null;

require '../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
  <div id="about" class="about2">
    <div class="content-about2">
      <div class="about2-content-text">
        <div class="title-about2">
          <h2>About Read</h2>
        </div>
        <div class="container-all-crud">
          <div class="alert">
            <?php if (intval($result2) === 1) : ?>
              <p class="fineAlert">Anuncio Creado Correctamente</p>
            <?php elseif (intval($result2) === 2) : ?>
              <p class="fineAlert">Anuncio Actualizado Correctamente</p>
            <?php endif ?>
          </div>
          <div class="content-about-info">
            <?php while ($propertys = mysqli_fetch_assoc($result)) : ?>

              <div class="text-about2">
                <div class="button-cont create">
                  <a href="/admin/properties/aboutAdminCrud/update.php?id=<?php echo $propertys['idabout'] ?>" class="button"><span class="button_top">Update</span></a>
                </div>
                <p>
                  <?php echo nl2br($propertys['Description']) ?>
                </p>

              </div>
            <?php endwhile; ?>
          </div>

        </div>
        <div class="button-cont">
          <a href="/admin/indexAdmin.php" class="button"><span class="button_top"> Back</span></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>