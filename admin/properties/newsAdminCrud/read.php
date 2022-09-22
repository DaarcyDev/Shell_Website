<?php
//importar conexion de la base de dato
require '../../../includes/config/database.php';
$db = conectarDB();
//escribir el query
$query = "SELECT * FROM news";
// echo $query;
$result = mysqli_query($db, $query);
//consular la base de datos


require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>

<div class="container">
    <div id="news" class="news2-crud">
        <div class="content-news2-crud">
            <div class="news2-content-text-crud">
                <div class="title-news2-crud">
                    <h2>News Crud</h2>
                </div>
            </div>
            <div class="container-all-crud">
                <div class="contenedor contenido-principal-crud">
                    <main class="blog-crud">
                        <article class="entrada-crud">
                            <?php while ($propertys = mysqli_fetch_assoc($result)): ?>
                            <div class="entrada-blog-crud">
                                <div class="entrada-imagen-crud">
                                    <img src="../../../images/<?php echo $propertys['Image'] ?>">
                                </div>
                                <div class="entrada-info-crud">
                                    <div class="entrada-meta-crud">
                                        <div class="entrada-meta-izquierda-crud">
                                            <i class="far fa-user-circle" aria-hidden="true"></i><span> Shell </span>
                                            <i class="far fa-clock" aria-hidden="true"></i><span> <?php echo $propertys['Date'] ?> </span>
                                        </div>
                                        <div class="entrada-meta-derecha-crud">
                                            <i class="fas fa-comments" aria-hidden="true"></i><span>  <?php echo $propertys['Message'] ?></span>
                                            <span class="hot"><i class="fas fa-fire-alt" aria-hidden="true"></i>  <?php echo $propertys['Fire'] ?> </span>
                                        </div>
                                    </div>
                                    <h4> <?php echo $propertys['Title'] ?></h4>
                                    <hr />
                                    <p>
                                         <?php echo $propertys['Description'] ?>
                                    </p>
                                </div>
                                <a href="newsInfo.php" class="boton-entrada">Leer Entrada</a>
                            </div>
                            <?php endwhile; ?>
                        </article>
                    </main>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/newsAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>

</div>
<!-- cerramos conexion -->
<?php mysqli_close($db)?>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>