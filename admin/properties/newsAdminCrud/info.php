<?php
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}

require '../../../includes/config/database.php';
$db = conectarDB();

//*obtener los datos de la BD
$query = "SELECT * FROM news WHERE idnews = $id";

$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);

$query2 = "SELECT * FROM news WHERE idnews != $id LIMIT 2";

$result2 = mysqli_query($db, $query2);

require '../../../includes/funciones.php';

  incluirTemplate('circleMenu');

?>

<div class="container">
  <!-- <img class="disc-img1" src="build/img/IFILC-1.webp" /> -->

  <div id="news" class="news2">
    <div class="content-news2">
      <div class="news2-content-text">
        <div class="title-news2">
          <h2>News</h2>
        </div>
      </div>

      <div class="container-all-news2">
        <div class="contenedor contenido-principal-news2">

          <main class="blog-news2">

            <article class="entrada-news2">
              <h3><?php echo $property['Title']; ?></h3>

              <div class="entrada-blog-news2">

                <div class="entrada-info-news2">
                  <div class="entrada-imagen-news2">
                    <img src="/images/<?php echo $property['Image']; ?>">
                  </div>
                  <div class="info-text-news">
                    <?php echo nl2br($property['DescriptionComplete']); ?>
                  </div>
                  
                </div>


              </div>

            </article>
          </main>
          <aside class="sidebar-news2">
          <h3 class="title-sidebar">more news</h3>
          <?php while ($propertys = mysqli_fetch_assoc($result2)): ?>
            <a href="newsInfo.php">
              <ul class="lineas_cont">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
                <li class="widget-curso-news2">
                  <div class="widget-imagen-news2">
                    <img src="/images/<?php echo $propertys['Image']; ?>">
                  </div>
                  <div class="widget-info-news2">
                    <h4><?php echo $propertys['Title']; ?></h4>
                    <p>
                        <?php echo $propertys['Description']; ?>
                    </p>
                  </div>
                </li>
              </ul>
            </a>
            <?php endwhile; ?>
          </aside>


        </div>
      </div>
      <?php incluirTemplate('download'); ?>
      <div class="button-cont">
        <a href="/admin/properties/newsAdmin.php" class="button"><span class="button_top"> Back</span></a>
      </div>
    </div>
  </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>