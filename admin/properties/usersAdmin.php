<?php
require '../../includes/funciones.php';
$auth = autenticate();
if(!$auth){
    header('Location: /');
  }
//importar conexion de la base de dato
require '../../includes/config/database.php';
$db = conectarDB();
//escribir el query
$query = "SELECT * FROM register";
// echo $query;
$result = mysqli_query($db, $query);
//consular la base de datos
$result2 = $_GET['resultado'] ?? null;


incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="about2">
        <div class="content-about2-admin">
            <div class="about2-content-text">
                <div class="title-about2">
                    <h2>Users Read</h2>
                </div>
                <div class="container-all-crud">
                    <div class="alert">
                        <?php if (intval($result2) === 2) : ?>
                            <p class="fineAlert">usuario Actualizado Correctamente</p>
                        <?php elseif (intval($result2) === 3) : ?>
                            <p class="fineAlert">usuario Eliminado Correctamente</p>
                        <?php endif ?>

                    </div>
                    <div class="content-user-info">
                        <table class="property">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserName</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birtdate</th>
                                    <th>Email</th>
                                    
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ($propertys = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $propertys['idregister'] ?></td>
                                        <td><?php echo $propertys['UserName'] ?></td>
                                        <td><?php echo $propertys['FirstName'] ?></td>
                                        <td><?php echo $propertys['LastName'] ?></td>
                                        <td><?php echo $propertys['BirthDate'] ?></td>
                                        <td><?php echo $propertys['Email'] ?></td>
                                        
                                        <td>
                                            <a href="/admin/properties/usersAdminCrud/update.php?id=<?php echo $propertys['idregister'] ?>" class="boton-entrada-Update">Update</a>
                                            <a href="/admin/properties/usersAdminCrud/delete.php?id=<?php echo $propertys['idregister'] ?>" class="boton-entrada-Delete">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>




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