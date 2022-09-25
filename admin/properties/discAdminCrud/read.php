<?php
//importar conexion de la base de dato
require '../../../includes/config/database.php';
$db = conectarDB();
//escribir el query
$query = "SELECT * FROM discography";
// echo $query;
$result = mysqli_query($db, $query);
//consular la base de datos


require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <!-- <img class="disc-img1" src="build/img/IFILC-1.webp" /> -->

    <div id="discography" class="discography2">
        <div class="content-discography2">
            <div class="discography2-content-text">
                <div class="title-discography2">
                    <h2>discography</h2>
                </div>
            </div>

            <div class="container-all">
                <div class="content-img-discography-singles " id="1">
                    <?php while ($propertys = mysqli_fetch_assoc($result)) : ?>
                        <div class="content-img lines lines">
                            <a href="discographyProduct.php">
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
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>  
            <div class="button-cont">
                <a href="/admin/properties//discAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- cerramos conexion -->
<?php mysqli_close($db) ?>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>