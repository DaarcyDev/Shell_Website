<?php
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];

$Email = "";
$Password = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    if (!$Email) {
        $errores[] = "Debes añadir un correo";
    }

    if (!$Password) {
        $errores[] = "Debes añadir una contraseña";
    }
    if (empty($errores)) {
        $consulta = "SELECT * FROM register WHERE Email = '$Email'";
        $resultado = mysqli_query($db, $consulta);
        
        $followingdata = $resultado->fetch_assoc();
        // echo "<pre>";
        // echo ".";
        // echo "</pre>";
        // echo "<pre>";
        // echo ".";
        // echo "</pre>";
        // echo "<pre>";
        // echo ".";
        // echo "</pre>";
        echo $followingdata['Email'];
        
        
    }
}


// $query = "INSERT INTO admin ( UserName, Email, Password, Register_idRegister) 
//                 VALUES ('$UserName', '$Email', '$Password', 'idRegister')";
// //$resultado = mysqli_query($db, $query);
// var_dump($query);

require 'includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud userAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Login</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form method="POST" class="formulario" novalidate>
                        <fieldset>
                            <legend>Email y Password</legend>

                            <label for="email">Email</label>
                            <input required type="email" name="email" placeholder="Tu Email" id="email" value="<?php $Email ?>">

                            <label for="password">Password</label>
                            <input required type="password" name="password" placeholder="Tu Password" id="password" value="<?php $Password ?>">
                        </fieldset>

                        <input type="submit" value="Crear Propiedad" class="button_accept">
                        <a href="/register.php" class="button_accept">registro</a>
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="index.php" class="button"><span class="button_top">Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>