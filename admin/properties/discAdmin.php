<?php
//importar conexion de la base de dato
require '../../includes/config/database.php';
$db = conectarDB();
//escribir el query
$query = "SELECT * FROM discography";
// echo $query;
$result = mysqli_query($db, $query);
//consular la base de datos

$result2 = $_GET['resultado'] ?? null;

require '../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
  <!-- <img class="disc-img1" src="build/img/IFILC-1.webp" /> -->

  <div id="discography" class="discography2">
    <div class="content-discography2">
      <div class="discography2-content-text">
        <div class="title-discography2">
          <h2>Discography Read</h2>
        </div>
      </div>

      <div class="container-all-crud">
        <div class="alert">
          <?php if(intval($result2) === 1): ?>
            <p class="fineAlert">Anuncio Creado Correctamente</p>
          <?php elseif(intval($result2) === 2):?>
            <p class="fineAlert">Anuncio Actualizado Correctamente</p>
          <?php endif ?>
        </div>
        
        <div class="button-cont">
          <a href="/admin/properties/discAdminCrud/create.php" class="button"><span class="button_top">Create</span></a>
        </div>
        <div class="content-img-discography-singles " id="1">
          <?php while ($propertys = mysqli_fetch_assoc($result)) : ?>
            <div class="content-img lines lines">
              <a href="#">
                <img class="img-discography" src="../../../images/<?php echo $propertys['Image'] ?>" />
                <ul>
                  <span class="linea"></span>
                  <span class="linea"></span>
                  <span class="linea"></span>
                  <span class="linea"></span>
                  <h3><?php echo $propertys['Title'] ?></h3>
                  <hr>
                  <p>Digital <?php echo $propertys['SingleAlbum'] ?></p>
                </ul>
                <!-- <p>Digital single</p> -->
                <div class="optionsCrud">
                  <a href="/admin/properties/discAdminCrud/update.php?id=<?php echo $propertys['iddiscography']?>" class="boton-entrada-Update">Update</a>
                  <a href="#" class="boton-entrada-Delete">Delete</a>
                </div>
              </a>
              
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
<!-- cerramos conexion -->
<?php mysqli_close($db) ?>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>