<?php


if (!isset($_SESSION)) {
    session_start();
}
$auth2 = $_SESSION['loginUser'] ?? false;
$userName = $_SESSION['userUser'] ?? "";
require 'includes/config/database.php';
$db = conectarDB();
$query = "SELECT * FROM register WHERE UserName = '${userName}'";
//echo $query;
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

require 'includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud crud">
            <div class="crud-content-text">
                <div class="title-crud">
                <?php if ($auth2) : ?>
                    <h2>Welcome <?php echo $userName ?></h2>   
                <?php endif ?>
                </div>
                <div class="buttons-crud">
                    <div class="data">
                    <?php if ($auth2) : ?>
                        <h2>UserName: <?php echo $userName ?></h2>
                        <h3>Name: <?php echo $user['FirstName']," ", $user['LastName'] ?></h3>
                        <h3>Email: <?php echo $user['Email'] ?></h3>
                        <h3>BirthDate: <?php echo $user['BirthDate'] ?></h3>
                        <h3>Id: <?php echo $user['idregister'] ?></h3>
                        
                    <?php endif ?>
                    </div>
                    
                    <a href="/updateUser.php?idUser=<?php echo $user['idregister'] ?>">
                        <ul class="lineas_cont">
                            <span class="linea"></span>
                            <span class="linea"></span>
                            <span class="linea"></span>
                            <span class="linea"></span>
                            <li class="widget-curso">
                                <h2>Update Info</h2>
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