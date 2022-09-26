<?php
//importar conexion de la base de dato
require '../../../includes/config/database.php';
$db = conectarDB();
//escribir el query
$query = "SELECT * FROM merch";
// echo $query;
$result = mysqli_query($db, $query);
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>

<div class="container">


    <div id="merch" class="merch2">
        <div class="content-merch2">
            <div class="merch2-content-text">
                <div class="title-merch2">
                    <h2>merch</h2>
                </div>
            </div>
            <div class="content-img-merch">
            <?php while ($propertys = mysqli_fetch_assoc($result)) : ?>
                <div class="content-img">

                        <ul class="lineas_cont">
                            <span class="linea"></span>
                            <span class="linea"></span>
                            <span class="linea"></span>
                            <span class="linea"></span>
                            <img class="img-merch" src="/images/<?php echo $propertys['Image'] ?>" />
                            <h3><?php echo $propertys['Title'] ?></h3>
                            <hr>
                            <div class="price">
                                <p>$<?php echo $propertys['Price'] ?></p>
                                <a href="#">Select Option</a>
                            </div>
                        </ul>

                </div>
                <?php endwhile; ?>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/merchAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>

</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>